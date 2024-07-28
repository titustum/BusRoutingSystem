<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                 JOURNEY | BOOKINGS
             </div>


             <div class="grid gap-3 px-4 py-4 border-t border-orange-600">

                <div class="p-3 border rounded-md">
                    @foreach ($journeys as $journey)
                        <div class="text-lg font-bold ">{{ $journey->origin }} - {{ $journey->destination }}</div>
                        <div>{{ $journey->payments->count() }} Parents booked</div>
                        <p class="mt-3"><a href="{{ route('driver.show.booking', $journey) }}" class="text-blue-600">Check Bookings →</a></p>
                    @endforeach

                </div>

             </div>




     </div>


 </x-app-layout>
