<x-app-layout header="Passenger">


    <div class="flex flex-col w-full min-h-[70vh] p-4 my-16">

             <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                {{ $journey->origin }} <i class="text-green-600 fas fa-arrow-right"></i>  {{ $journey->destination }} JOURNEY

             </div>

             {{-- one journey --}}

             <div class="my-5">
                 <h1 class="flex justify-between py-3 border-b border-orange-600">
                    Journey details

                    <span class="text-sm">
                        <i class="far fa-clock"></i>:
                        {{ $journey->created_at }}
                    </span>
                 </h1>

                 <div id="details" class="my-2">
                    <div class="detail-item">
                        <strong>Start Location:</strong>
                        <span id="start-location">{{ $journey->origin }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>End Location:</strong>
                        <span id="end-location">{{ $journey->destination }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Driver:</strong>
                        <span id="distance">James Mwangi</span>
                    </div>
                    <div class="detail-item">
                        <strong>Bus Number:</strong>
                        <span id="distance">KCA7867X</span>
                    </div>
                    <div class="detail-item">
                        <strong>Distance:</strong>
                        <span id="distance">480 km</span>
                    </div>
                    <div class="detail-item">
                        <strong>Estimated Time:</strong>
                        <span id="estimated-time">8 hours</span>
                    </div>
                </div>

                <div id="map" class="min-h-[300px] rounded-md"></div>

             </div>


             <div class="mt-auto">
                <a href="{{ route('journey.pay', $journey->id) }}" class="w-full px-6 py-3 text-white bg-green-600 rounded-md">Pay: KSh.{{ number_format($journey->price) }} </a>
             </div>

     </div>






    <script src='https://api.mapbox.com/mapbox-gl-js/v3.5.1/mapbox-gl.js'></script>
    <script>
        // Replace 'your_mapbox_access_token' with your actual Mapbox access token
        mapboxgl.accessToken = "{{ env('MAPBOX_KEY') }}";

        // Initialize the map
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [39.6682, -3.0565], // starting position [lng, lat]
            zoom: 5 // starting zoom
        });

        // Add map controls
        map.addControl(new mapboxgl.NavigationControl());

        // Coordinates for the journey from Mombasa to Nairobi
        var route = [
            [39.6682, -4.0435], // Mombasa
            [36.8219, -1.2921]  // Nairobi
        ];

        // Add the route to the map
        map.on('load', function () {
            map.addSource('route', {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'properties': {},
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': route
                    }
                }
            });

            map.addLayer({
                'id': 'route',
                'type': 'line',
                'source': 'route',
                'layout': {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                'paint': {
                    'line-color': '#ff0000',
                    'line-width': 4
                }
            });
        });
    </script>

 </x-app-layout>
