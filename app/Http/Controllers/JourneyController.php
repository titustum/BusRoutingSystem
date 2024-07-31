<?php

namespace App\Http\Controllers;

use App\Models\Journey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $validatedData = $request->validate([
            'origin' => 'required|string',
            'destination' => 'required|string',
            'origin_coordinates' => 'required|string',
            'destination_coordinates' => 'required|string',
            'price' => 'required|numeric',
            'distance' => 'required|numeric', // Add this line
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
        ]);

        $user = auth()->user();
        if (!$user->driver_details) {
            return redirect()->back()->withErrors('Driver details not found for the logged-in user.');
        }
        $journey = new Journey($validatedData);
        $journey->user_id = $user->id;
        $journey->driver_id = $user->driver_details->id;
        $journey->save();

        return redirect()->route('journeys.index')->with('success', 'Journey created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Journey $journey)
    {
        $apiKey = env('GOOGLE_MAPS_KEY');

        // Fetch directions data
        $directionsUrl = "https://maps.googleapis.com/maps/api/directions/json?" . http_build_query([
            'origin' => $journey->origin_coordinates,
            'destination' => $journey->destination_coordinates,
            'key' => $apiKey
        ]);

        $directionsResponse = Http::get($directionsUrl);
        $directionsData = $directionsResponse->json();

        $distance = $directionsData['routes'][0]['legs'][0]['distance']['text'] ?? 'Unknown';
        $duration = $directionsData['routes'][0]['legs'][0]['duration']['text'] ?? 'Unknown';

        //

        // Extract the encoded polyline from the directions response
        $encodedPolyline = $directionsData['routes'][0]['overview_polyline']['points'] ?? '';

        // Create the static map URL with the route
        $mapUrl = "https://maps.googleapis.com/maps/api/staticmap?" . http_build_query([
            'size' => '600x400',
            'markers' => "color:red|label:A|{$journey->origin_coordinates}|" .
                        "color:red|label:B|{$journey->destination_coordinates}",
            'path' => "enc:{$encodedPolyline}",
            'key' => $apiKey
        ]);

        return view('journey.show', compact('journey', 'mapUrl', 'distance', 'duration'));
    }

    public function search(Request $request)
    {
        // Retrieve the input values and add wildcard characters for the LIKE query
        $origin = '%' . $request->origin . '%';
        $destination = '%' . $request->destination . '%';

        $journeys = Journey::where('origin', 'like', $origin)
                            ->where('destination', 'like', $destination)
                            ->get();

        // Debug output if needed
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









    public function getJourneyDetails(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        // Get coordinates
        $originCoordinates = $this->getCoordinates($origin);
        $destinationCoordinates = $this->getCoordinates($destination);

        if (!$originCoordinates || !$destinationCoordinates) {
            return response()->json(['success' => false, 'message' => 'Unable to fetch coordinates. Please check the addresses.']);
        }

        // Get distance
        $distance = $this->getDistance($originCoordinates, $destinationCoordinates);

        if ($distance === null) {
            return response()->json(['success' => false, 'message' => 'Unable to fetch distance. Please check the addresses.']);
        }

        // Calculate estimated price
        $estimatedPrice = round($distance * 50);

        return response()->json([
            'success' => true,
            'originCoordinates' => $originCoordinates,
            'destinationCoordinates' => $destinationCoordinates,
            'distance' => $distance,
            'estimatedPrice' => $estimatedPrice
        ]);
    }

    private function getCoordinates($address)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $address,
            'key' => env('GOOGLE_MAPS_KEY')
        ]);

        $data = $response->json();

        if ($data['status'] === 'OK') {
            $location = $data['results'][0]['geometry']['location'];
            return $location['lat'] . ',' . $location['lng'];
        }

        return null;
    }

    private function getDistance($origin, $destination)
    {
        $response = Http::get('https://maps.googleapis.com/maps/api/directions/json', [
            'origin' => $origin,
            'destination' => $destination,
            'key' => env('GOOGLE_MAPS_KEY')
        ]);

        $data = $response->json();

        if ($data['status'] === 'OK') {
            $distanceText = $data['routes'][0]['legs'][0]['distance']['text'];
            return (float) str_replace([',', ' km'], '', $distanceText);
        }

        return null;
    }


}
