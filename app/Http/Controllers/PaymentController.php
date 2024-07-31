<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function pay($id)
    {
        $journey = Journey::findOrFail($id);
        return view('payments.create', compact('journey'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'mobile_number' => 'required|string|max:15',
            'transaction_code' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
        ]);

        // Create a new payment record
        Payment::create([
            'user_id' => Auth::id(), // Assuming the user is logged in
            'mobile_number' => $validatedData['mobile_number'],
            'transaction_code' => $validatedData['transaction_code'],
            'amount' => $validatedData['amount'],
        ]);

        return view('payments.payment-status');
    }


    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
