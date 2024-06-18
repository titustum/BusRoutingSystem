<x-mobile-layout header="Driver">
 

   <div class="h-screen w-full my-16 flex flex-col p-4">
 
            <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                DRIVER DASHBOARD
            </div>
    
            <form class="mt-3 p-2 shadow rounded-md border">

                <h1 class="font-bold text-center">Create A Route</h1>

                @csrf
                
                <!-- destination -->
                <div class="mt-4">
                    <x-input-label for="usertype" :value="__('Select origin')" />
                    <select id="usertype" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="usertype" :value="old('usertype')" required />
                        <option>Mombasa</option>
                        <option>Nairobi</option>
                        <option>Bungoma</option>
                        <option>Kisumu</option>
                        <option>Eldoret</option>
                        <option>Nyeri</option>
                    </select>
                    <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                </div>
    
                <!-- destination -->
                <div class="mt-4">
                    <x-input-label for="usertype" :value="__('Select destination')" />
                    <select id="usertype" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="usertype" :value="old('usertype')" required />
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
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

                <!-- Time --> 
            <div class="mt-4">
                <x-input-label for="price" :value="__('Starting time')" />
                <x-text-input id="price" class="block mt-1 w-full" type="time" name="price" :value="old('price')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

                <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
                   Create New Route
                </button>
            </form>




            {{-- You recently added jourmeys --}}

            <div class="my-5 ">
                <h1 class="py-3 border-b border-orange-600">Your recently added travels</h1>
    
                <div class="grid gap-3 mt-4">
    
                    @for ($i=0; $i<5; $i++)
    
                    <div class="border shadow p-3 rounded-md grid gap-3 grid-cols-3">
                        <div>
                            <div class="flex flex-col text-center justify-center h-full w-full bg-gray-200 rounded-md">
                                <h1 class="text-2xl text-green-600 font-bold">{{ random_int(0, 12) }}</h1>
                                <div>Booked</div>

                            </div>
                        </div>
                        <div class="col-span-2">
                            <div>Route: Nairobi to Mombasa</div>
                            <div>Start Time: 10:30 AM</div>
                            <div>Ticket Price: KES 2,000</div>
                            <button type="submit" 
                                class="w-full text-sm block text-center mx-auto py-2 px-2 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
                               View bookings
                            </button>
                        </div>
                    </div>
                        
                    @endfor  
                
                </div>

    </div>






    

</x-mobile-layout>
