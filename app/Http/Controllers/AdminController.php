<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewDrivers(){
        $drivers = User::where('role', 'driver')->get();
        return view('admin.view_drivers', compact('drivers'));
    }
    public function viewPassengers(){
        $passengers = User::where('role', 'passenger')->get();
        return view('admin.view_passengers', compact('passengers'));
    }
    public function viewJourneys(){
        $journeys = Journey::get();
        return view('admin.view_journeys', compact('journeys'));
    }
    public function viewPayments(){
        $payments = Payment::get();
        return view('admin.view_payments', compact('payments'));
    }
}
