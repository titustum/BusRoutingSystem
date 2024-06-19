<?php

namespace App\Http\Controllers;

use App\Models\Journey;
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
            $journeys = Journey::limit(5)->get();
            return view('passenger.dashboard', compact('journeys'));
        }
        return view('driver.dashboard');
    }
}
