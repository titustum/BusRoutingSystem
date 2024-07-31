<x-app-layout header="Driver">
    <div class="flex flex-col w-full h-screen p-4 my-16">
        <form method="POST" action="{{ route('journeys.store') }}" class="max-w-2xl p-6 mx-auto mt-3 border rounded-md shadow" id="journey-form">
            <h2 class="text-orange-600 text-2xl text-center uppercase font-['Righteous'] mb-6">
                Driver | Create Journey
            </h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            @csrf

            <div class="grid grid-cols-1 gap-4">
                <!-- Origin -->
                <div>
                    <x-input-label for="origin" :value="__('Select origin')" />
                    <x-text-input id="origin" class="block w-full mt-1" name="origin" :value="old('origin')" required/>
                    <x-input-error :messages="$errors->get('origin')" class="mt-2" />
                </div>

                <!-- Destination -->
                <div>
                    <x-input-label for="destination" :value="__('Select destination')" />
                    <x-text-input id="destination" class="block w-full mt-1" name="destination" :value="old('destination')" required />
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>

                <!-- Hidden Origin Coordinates -->
                <input type="hidden" id="origin_coordinates" name="origin_coordinates" value="{{ old('origin_coordinates') }}" />

                <!-- Hidden Destination Coordinates -->
                <input type="hidden" id="destination_coordinates" name="destination_coordinates" value="{{ old('destination_coordinates') }}" />

                <!-- Hidden Distance -->
                <input type="hidden" id="distance" name="distance" value="{{ old('distance') }}" />

                <!-- Hidden Distance -->
                <input type="hidden" id="price" name="price" value="{{ old('price') }}" />


                <!-- Date -->
                <div>
                    <x-input-label for="departure_date" :value="__('Departure Date (YYYY-MM-DD)')" />
                    <x-text-input type="text" id="departure_date" name="departure_date" class="block w-full mt-1" :value="old('departure_date')" placeholder="e.g. 2024-07-23" required/>
                    <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                </div>

                <!-- Time -->
                <div>
                    <x-input-label for="departure_time" :value="__('Departure Time (HH:MM)')" />
                    <x-text-input type="text" id="departure_time" name="departure_time" class="block w-full mt-1" :value="old('departure_time')" placeholder="e.g. 14:30" required/>
                    <x-input-error :messages="$errors->get('departure_time')" class="mt-2" />
                </div>
            </div>

            <button type="submit" class="w-full px-6 py-3 mt-6 text-center text-white bg-orange-600 rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                Create New Journey
            </button>
        </form>
    </div>

   <!-- Google Maps API Script -->
   <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&libraries=places&callback=initAutocomplete"></script>
   <script>
       function initAutocomplete() {
           const originInput = document.getElementById('origin');
           const destinationInput = document.getElementById('destination');

           new google.maps.places.Autocomplete(originInput);
           new google.maps.places.Autocomplete(destinationInput);
       }

       document.addEventListener('DOMContentLoaded', function() {
           document.getElementById('journey-form').addEventListener('submit', async function(event) {
               event.preventDefault();

               const origin = document.getElementById('origin').value;
               const destination = document.getElementById('destination').value;

               try {
                   const response = await fetch('{{ route("get.journey.details") }}', {
                       method: 'POST',
                       headers: {
                           'Content-Type': 'application/json',
                           'X-CSRF-TOKEN': '{{ csrf_token() }}'
                       },
                       body: JSON.stringify({ origin, destination })
                   });

                   if (!response.ok) {
                       throw new Error('Network response was not ok');
                   }

                   const data = await response.json();

                   if (data.success) {
                       document.getElementById('origin_coordinates').value = data.originCoordinates;
                       document.getElementById('destination_coordinates').value = data.destinationCoordinates;
                       document.getElementById('distance').value = data.distance;
                       document.getElementById('price').value = data.estimatedPrice;

                       event.target.submit();
                   } else {
                       alert(data.message || 'Unable to process journey details. Please try again.');
                   }
               } catch (error) {
                   console.error('Error:', error);
                   alert('An error occurred. Please try again.');
               }
           });
       });
   </script>
</x-app-layout>
