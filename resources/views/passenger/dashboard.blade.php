<x-app-layout header="Passenger">

    <div class="flex flex-col w-full h-screen p-4 pb-6 mt-16">

        <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
            Parent Dashboard
        </div>

        <form method="POST" action="{{ route('journeys.search') }}">
            @csrf
            <!-- destination -->
            <div class="mt-4">
                <x-input-label for="origin" :value="__('Select your location')" />
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
                <x-input-error :messages="$errors->get('destination')" class="mt-2" />

            </div>
            <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80 focus:opacity-80">
               <i  class="fa fa-search"></i> Find Buses
            </button>
        </form>




        <div class="mt-5 ">
            <h1 class="py-3 border-b border-orange-600">Recently added route travels</h1>

            <div class="grid gap-3 mt-4">


                @foreach ($journeys as $journey)

                <div class="grid grid-cols-3 gap-3 p-3 border rounded-md shadow">
                   <div>

                       <div class="flex flex-col text-center justify-center h-[90%] w-full bg-gray-200 rounded-md">
                           <i class="text-orange-600 fas fa-bus"></i>
                           <h1 class="font-bold">Bus Kenya</h1>
                       </div>
                   </div>
                   <div class="col-span-2 text-sm">
                       <div>Route: {{ $journey->origin }} to {{ $journey->destination }}</div>
                       <div>Start Time: {{ $journey->departure_time }}</div>
                       <div>Ticket Price: <b>KSh. {{ number_format($journey->price) }}</b></div>
                       <a href="{{ route('journeys.show', $journey) }}" class="text-blue-600">
                        More Details <i class="fas fa-arrow-right"></i>
                        </a>

                   </div>
               </div>

                @endforeach

            </div>

        </div>





    </div>

</x-app-layout>
