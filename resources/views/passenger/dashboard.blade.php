<x-mobile-layout header="Passenger">

    <div class="h-screen w-full mt-16 pb-6 flex flex-col p-4">
 
        <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
            Passenger Dashboard
        </div>

        <form>
            <!-- destination -->
            <div class="mt-4">
                <x-input-label for="usertype" :value="__('Select your location')" />
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
                <x-input-label for="usertype" :value="__('Select destnation')" />
                <select id="usertype" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="usertype" :value="old('usertype')" required />
                    <option>Nairobi</option>
                    <option>Mombasa</option>
                    <option>Kisumu</option>
                    <option>Eldoret</option>
                    <option>Nyeri</option>
                </select>
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                    
            </div>
            <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
               <i  class="fa fa-search"></i> Find Buses
            </button>
        </form>




        <div class="mt-5 ">
            <h1 class="py-3 border-b border-orange-600">Recently added route travels</h1>

            <div class="grid gap-3 mt-4">

                @for ($i=0; $i<6; $i++)

                <div class="border shadow p-3 rounded-md grid gap-3 grid-cols-3">
                    <div>
                        
                        <div class="flex flex-col text-center justify-center h-[90%] w-full bg-gray-200 rounded-md">
                            <i class="fas fa-bus text-orange-600"></i>
                            <h1 class="font-bold">Bus Kenya</h1> 
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div>Route: Nairobi to Mombasa</div>
                        <div>Start Time: 10:30 AM</div>
                        <div>Ticket Price: KES 2,000</div>
                        <button type="submit" 
                            class="w-full text-sm block text-center mx-auto py-2 px-2 bg-black rounded-md text-white hover:bg-orange-600 focus:bg-orange-600">
                           Book Now
                        </button>
                    </div>
                </div>
                    
                @endfor  
            
            </div>

        </div>





    </div>

</x-mobile-layout>