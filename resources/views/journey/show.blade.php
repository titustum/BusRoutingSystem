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
                        <span id="distance">{{ $journey->driver }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Bus Number:</strong>
                        <span id="distance">KCA7867X</span>
                    </div>

                    <div id="info"></div>

                    {{-- <div class="detail-item">
                        <strong>Distance:</strong>
                        <span id="distance">{{ $journey->distance }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Estimated Time:</strong>
                        <span id="estimated-time">{{ $journey->estimated_time }}</span>
                    </div> --}}
                </div>

                <div id="map" class="min-h-[300px] rounded-md"></div>

             </div>



             <div class="mt-auto">
                <a href="{{ route('journey.pay', $journey->id) }}" class="w-full px-6 py-3 text-white bg-green-600 rounded-md">Pay: KSh.{{ number_format($journey->price) }} </a>
             </div>

     </div>







     <script>
         // Define the initMap function globally
         function initMap() {
             var directionsService = new google.maps.DirectionsService();
             var directionsRenderer = new google.maps.DirectionsRenderer();
             var map = new google.maps.Map(document.getElementById('map'), {
                 zoom: 7,
                 center: {lat: 0, lng: 0}
             });
             directionsRenderer.setMap(map);

             var originCoords = "{{ $journey->origin_coordinates }}".split(',');
             var destCoords = "{{ $journey->destination_coordinates }}".split(',');

             var request = {
                 origin: new google.maps.LatLng(parseFloat(originCoords[0]), parseFloat(originCoords[1])),
                 destination: new google.maps.LatLng(parseFloat(destCoords[0]), parseFloat(destCoords[1])),
                 travelMode: 'DRIVING'
             };

             directionsService.route(request, function(result, status) {
                 if (status === 'OK') {
                     directionsRenderer.setDirections(result);

                     var route = result.routes[0];
                     var leg = route.legs[0];

                     // Display distance and duration
                     document.getElementById('info').innerHTML = '<b>Distance:</b> ' + leg.distance.text + '<br><b>Duration:</b> ' + leg.duration.text;
                 } else {
                     console.error('Directions request failed due to ' + status);
                     document.getElementById('info').innerHTML = 'Unable to calculate directions.';
                 }
             });
         }
     </script>


<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap" async defer></script>



 </x-app-layout>
