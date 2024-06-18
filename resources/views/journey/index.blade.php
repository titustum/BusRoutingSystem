<x-app-layout header="Driver">


    <div class="h-screen w-full my-16 flex flex-col p-4">

             <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                12 | DRIVER JOURNEYS
             </div>

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



 </x-app-layout>
