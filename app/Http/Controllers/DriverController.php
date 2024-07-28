<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Journey;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function storeDetails(Request $request) {
        Driver::create($request->all());
        return redirect()->route('dashboard');
    }
    public function viewBookings() {

        $user = User::findOrFail(Auth::id());

        $journeys = $user->journeys;

        return view('driver.view_bookings', compact('journeys'));
    }

    public function showBooking($id) {
        $journey =  Journey::findOrFail($id);
        return view('driver.show_booking', compact('journey'));
    }
}
