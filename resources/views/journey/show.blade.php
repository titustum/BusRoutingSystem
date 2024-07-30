<x-app-layout header="Passenger">


    <div class="flex flex-col w-full min-h-[70vh] p-4 my-16">


        <div class="text-orange-600 pb-3 flex items-center justify-between border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
            <a href="{{ route('dashboard') }}" class="text-sm text-black"><i class="mr-1 fas fa-arrow-left"></i>Back</a>
            {{ $journey->origin }} <i class="text-green-600 fas fa-arrow-right"></i>  {{ $journey->destination }} JOURNEY
            <div></div>
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
                        <span id="distance">{{ $journey->driver }}</span>
                    </div>

                    <div id="info"></div>

                    <div class="detail-item">
                        <strong>Distance:</strong>
                        <span id="distance">{{ $distance }}</span>
                    </div>
                    <div class="detail-item">
                        <strong>Estimated Time:</strong>
                        <span id="estimated-time">{{ $duration }}</span>
                    </div>
                </div>

                <img id="map" class="min-h-[300px] rounded-md w-auto" src="{{ $mapUrl }}" alt="Journey Map">

             </div>



             <div class="flex justify-between mt-auto">
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-400 rounded-md">Back</a>
                <a href="{{ route('journey.pay', $journey->id) }}" class="block px-6 py-3 text-white bg-orange-600 rounded-md">Book @ KSh. {{ number_format($journey->price) }} </a>
             </div>

     </div>



 </x-app-layout>
