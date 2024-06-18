<x-app-layout header="Driver">


    <div class="h-screen w-full my-16 flex flex-col p-4">

             <form method="POST" action="{{ route('journeys.store') }}" class="mt-3 p-3 shadow rounded-md border">

                <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                    DRIVER | CREATE JOURNEY
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                 @csrf

                 <!-- destination -->
                 <div class="mt-4">
                     <x-input-label for="origin" :value="__('Select origin')" />
                     <select id="origin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="origin" :value="old('origin')" required />
                         <option>Mombasa</option>
                         <option>Nairobi</option>
                         <option>Bungoma</option>
                         <option>Kisumu</option>
                         <option>Eldoret</option>
                         <option>Nyeri</option>
                     </select>
                     <x-input-error :messages="$errors->get('origin')" class="mt-2" />
                 </div>

                 <!-- destination -->
                 <div class="mt-4">
                     <x-input-label for="destination" :value="__('Select destination')" />
                     <select id="destination" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="destination" :value="old('destination')" required />
                         <option>Nairobi</option>
                         <option>Mombasa</option>
                         <option>Kisumu</option>
                         <option>Eldoret</option>
                         <option>Nyeri</option>
                     </select>
                     <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                 </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price in Ksh.')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Date -->
                <div class="mt-4">
                    <x-input-label for="departure_date" :value="__('Departure date')" />
                    <x-text-input id="departure_date" class="block mt-1 w-full" type="date" name="departure_date" :value="old('departure_date')" required />
                    <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                </div>

                <!-- Time -->
                <div class="mt-4">
                    <x-input-label for="departure_time" :value="__('Departure time')" />
                    <x-text-input id="departure_time" class="block mt-1 w-full" type="time" name="departure_time" :value="old('departure_time')" required />
                    <x-input-error :messages="$errors->get('departure_time')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="seats_available" :value="__('Seats available')" />
                    <x-text-input id="seats_available" class="block mt-1 w-full" type="number" min="1" max="100" name="seats_available" :value="old('seats_available')" required />
                    <x-input-error :messages="$errors->get('seats_available')" class="mt-2" />
                </div>

                 <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
                    Create New Journey
                 </button>
             </form>



     </div>








 </x-app-layout>
