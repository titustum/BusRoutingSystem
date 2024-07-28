<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Safaricom\Mpesa\Mpesa;
use App\Models\Payment;
use App\Models\Journey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{

    public function initiatePayment(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|regex:/^254\d{9}$/',
            'amount' => 'required|numeric|min:1',
            'journey_id' => 'required|exists:journeys,id',
        ]);

        try {

            $BusinessShortCode = env("MPESA_SHORTCODE"); // Sandbox shortcode
            $LipaNaMpesaPasskey = env("MPESA_PASSKEY"); // Sandbox passkey
            $TransactionType = 'CustomerPayBillOnline';
            $Amount = round($request->amount);
            $PartyA = $request->phone_number;
            $PartyB = $BusinessShortCode;
            $PhoneNumber = $request->phone_number;
            $CallBackURL = 'https://yourdomain.com/mpesa/callback'; // Replace with your actual callback URL
            $AccountReference = 'Journey-' . $request->journey_id;
            $TransactionDesc = 'Payment for journey';

            // Generate the password
            $Timestamp = date('YmdHis');
            $Password = base64_encode($BusinessShortCode . $LipaNaMpesaPasskey . $Timestamp);

            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
            $token = "K8AWzhFk5YynG6kaeYv3D5faJycS";

            $response = Http::withToken($token)->post($url, [
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $Password,
                'Timestamp' => $Timestamp,
                'TransactionType' => $TransactionType,
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'PhoneNumber' => $PhoneNumber,
                'CallBackURL' => $CallBackURL,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDesc
            ]);

            $result = $response->json();

            Log::info('M-Pesa STK Push Response', $result);

            if(isset($result['ResponseCode']) && $result['ResponseCode'] == "0") {
                // STK push was successful, save pending payment
                $payment = new Payment([
                    'user_id'=> Auth::user()->id,
                    'journey_id' => $request->journey_id,
                    'amount' => $request->amount,
                    'phone_number' => $request->phone_number,
                    'transaction_code' => $result['CheckoutRequestID'],
                    'status' => 'pending',
                ]);
                $payment->save();

                return redirect()->route('payment.status', $payment->id)->with('success', 'Payment initiated. Please complete the transaction on your phone.');
            } else {
                Log::error('M-Pesa STK Push failed', $result);
                return back()->with('error', 'Failed to initiate payment. Error: ' . ($result['errorMessage'] ?? 'Unknown error'));
            }
        } catch (\Exception $e) {
            Log::error('M-Pesa initiation error: ' . $e->getMessage());
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function handleCallback(Request $request)
    {
        $callbackData = $request->all();
        Log::info('M-Pesa Callback received', $callbackData);

        // Find the payment by CheckoutRequestID
        $payment = Payment::where('transaction_code', $callbackData['CheckoutRequestID'])->first();

        if (!$payment) {
            Log::error('Payment not found for CheckoutRequestID: ' . $callbackData['CheckoutRequestID']);
            return response()->json(['status' => 'error', 'message' => 'Payment not found']);
        }

        if ($callbackData['ResultCode'] == 0) {
            // Payment successful
            $payment->status = 'completed';
            $payment->mpesa_receipt_number = $callbackData['MpesaReceiptNumber'];
            $payment->save();

            // Update journey status or perform other actions
            $journey = Journey::find($payment->journey_id);
            $journey->status = 'paid';
            $journey->save();

            // You might want to send a notification to the user here
        } else {
            // Payment failed
            $payment->status = 'failed';
            $payment->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Callback processed']);
    }

    public function checkPaymentStatus($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('payments.payment-status', compact('payment'));
    }
}
