<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Journey;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if (Auth::check() && strcasecmp(Auth::user()->role, 'PASSENGER') === 0) {
            $journeys = Journey::with('driver')->limit(5)->get();
            return view('passenger.dashboard', compact('journeys'));
        }elseif(Auth::check() && strcasecmp(Auth::user()->role, 'ADMIN') === 0){
            $journeys_count = Journey::count();
            $passengers_count = User::where('role', 'passenger')->count();
            $drivers_count = User::where('role', 'driver')->count();
            $payments_count = Payment::sum('amount');
            return view('admin.dashboard', compact('journeys_count', 'passengers_count', 'payments_count', 'drivers_count'));
        }else{
            return view('driver.dashboard');
        }

    }
}
