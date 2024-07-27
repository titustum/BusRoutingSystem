<x-app-layout header="Driver">
    <div class="flex flex-col w-full h-screen p-4 my-16">
        <form method="POST" action="{{ route('journeys.store') }}" class="max-w-2xl p-6 mx-auto mt-3 border rounded-md shadow">
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

               <!-- Origin Coordinates -->
                <div>
                    <x-input-label for="origin_coordinates" :value="__('Origin Coordinates (latitude, longitude)')" />
                    <x-text-input type="text" id="origin_coordinates" name="origin_coordinates"
                        class="block w-full mt-1"
                        :value="old('origin_coordinates')"
                        placeholder="e.g. -1.0384826716853783, 37.090233309831426"
                        required />
                    <x-input-error :messages="$errors->get('origin_coordinates')" class="mt-2" />
                </div>

                <!-- Destination Coordinates -->
                <div>
                    <x-input-label for="destination_coordinates" :value="__('Destination Coordinates (latitude, longitude)')" />
                    <x-text-input type="text" id="destination_coordinates" name="destination_coordinates"
                        class="block w-full mt-1"
                        :value="old('destination_coordinates')"
                        placeholder="e.g. -1.0384826716853783, 37.090233309831426"
                        required />
                    <x-input-error :messages="$errors->get('destination_coordinates')" class="mt-2" />
                </div>
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
</x-app-layout>
