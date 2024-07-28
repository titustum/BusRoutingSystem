<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    function storeDetails(Request $request) {
        Driver::create($request->all());
        return redirect()->route('dashboard');
    }
}
