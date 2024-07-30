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

                <!-- Price -->
                <div>
                    <x-input-label for="price" :value="__('Price (KSh)')" />
                    <x-text-input id="price" class="block w-full mt-1" type="number" name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
    <script>
        document.getElementById('journey-form').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the input values
            const origin = document.getElementById('origin').value;
            const destination = document.getElementById('destination').value;

            // Function to get coordinates
            const getCoordinates = async (address) => {
                const response = await fetch(`https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(address)}&key={{ env('GOOGLE_MAPS_KEY') }}`);
                const data = await response.json();
                if (data.status === 'OK') {
                    const location = data.results[0].geometry.location;
                    return `${location.lat}, ${location.lng}`;
                } else {
                    console.error('Geocoding error:', data.status);
                    return null;
                }
            };

            // Get the coordinates for origin and destination
            const originCoordinates = await getCoordinates(origin);
            const destinationCoordinates = await getCoordinates(destination);

            if (originCoordinates && destinationCoordinates) {
                // Set the coordinates in the hidden input fields
                document.getElementById('origin_coordinates').value = originCoordinates;
                document.getElementById('destination_coordinates').value = destinationCoordinates;

                // Submit the form
                event.target.submit();
            } else {
                alert('Unable to fetch coordinates. Please check the addresses.');
            }
        });
    </script>
</x-app-layout>
