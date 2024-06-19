<x-app-layout header="Driver">


    <div class="h-screen w-full my-16 flex flex-col p-4">

             <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                {{ Auth::user()->journeys->count() }} | DRIVER JOURNEYS
             </div>

             {{-- You recently added jourmeys --}}

             <div class="my-5 ">
                 <h1 class="py-3 border-b border-orange-600">Your recently added travels</h1>

                 <div class="grid gap-3 mt-4">

                     @foreach (Auth::user()->journeys as $journey)

                     <div class="border shadow p-3 rounded-md grid gap-3 grid-cols-3">
                         <div>
                             <div class="flex flex-col text-center justify-center h-full w-full bg-gray-200 rounded-md">
                                 <h1 class="text-2xl text-green-600 font-bold">{{ $journey->bookings()->count() }}</h1>
                                 <div>Booked</div>

                             </div>
                         </div>
                         <div class="col-span-2 text-sm">
                             <div>Route: {{$journey->origin}} to {{$journey->destination}}</div>
                             <div>Departure: {{$journey->departure_date}} {{ $journey->departure_time }}</div>
                             <div>Ticket Price: <b>KSh. {{ number_format($journey->price) }}</b> </div>
                             <button type="submit"
                                 class="w-full block text-center mx-auto py-2 px-2 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
                                View bookings
                             </button>
                         </div>
                     </div>

                     @endforeach

                 </div>

     </div>



 </x-app-layout>
