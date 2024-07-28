<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    function storeDetails(Request $request) {
        Passenger::create($request->all());
        return redirect()->route('dashboard');
    }
}
