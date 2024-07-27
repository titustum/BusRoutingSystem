<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('journey.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('journey.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Auth::user()->journeys()->create($request->all());
        return back()->with('status', 'Journey created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journey $journey)
    {
        return view('journey.show', compact('journey'));
    }


    public function search(Request $request)
    {
        $journeys = Journey::where('origin', $request->origin)
                            ->where('destination', $request->destination)
                            ->get();

        // dd($journeys);
        return view('journey.search', compact('journeys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journey $journey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journey $journey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journey $journey)
    {
        //
    }


}
