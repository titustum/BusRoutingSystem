<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <form method="POST" action="{{ route('journeys.store') }}" class="p-3 mt-3 border rounded-md shadow">

                <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                    DRIVER | CREATE JOURNEY
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                 @csrf

                 <!-- destination -->
                 <div class="mt-4">
                     <x-input-label for="origin" :value="__('Select origin')" />
                     <select id="origin" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="origin" :value="old('origin')" required />
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
                     <select id="destination" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="destination" :value="old('destination')" required />
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
                    <x-text-input id="price" class="block w-full mt-1" type="number" name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Date -->
                <div class="mt-4">
                    <x-input-label for="departure_date" :value="__('Departure Date')" />
                    <select id="departure_date" name="departure_date" class="block w-full mt-1 rounded-md" required>
                        <option value="2024-06-18">18-06-2024</option>
                        <option value="2024-06-19">19-06-2024</option>
                        <option value="2024-06-20">20-06-2024</option>
                        <option value="2024-06-21">21-06-2024</option>
                        <option value="2024-06-22">22-06-2024</option>
                    </select>
                    <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                </div>

                <!-- Time -->
                <div class="mt-4">
                    <x-input-label for="departure_time" :value="__('Departure Time')" />
                    <select id="departure_time" name="departure_time" class="block w-full mt-1 rounded-md" required>
                        <option value="07:00">7:00 AM</option>
                        <option value="08:00">8:00 AM</option>
                        <option value="09:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                    </select>
                    <x-input-error :messages="$errors->get('departure_time')" class="mt-2" />
                </div>



                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="seats_available" :value="__('Seats available')" />
                    <x-text-input id="seats_available" class="block w-full mt-1" type="number" min="1" max="100" name="seats_available" :value="old('seats_available')" required />
                    <x-input-error :messages="$errors->get('seats_available')" class="mt-2" />
                </div>

                 <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80 focus:opacity-80">
                    Create New Journey
                 </button>
             </form>



     </div>








 </x-app-layout>
