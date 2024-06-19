<x-app-layout header="Driver">


    <div class="h-screen w-full my-16 flex flex-col p-4">

             <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                {{ $journeys->count() }} | AVAILABLE JOURNEYS

             </div>

             {{-- You recently added jourmeys --}}

             <div class="my-5 ">
                 <h1 class="py-3 border-b border-orange-600">Your recently added travels</h1>

                 <div class="grid gap-3 mt-4">

                     @foreach ($journeys as $journey)

                     <div class="border shadow p-3 rounded-md grid gap-3 grid-cols-3">
                        <div>

                            <div class="flex flex-col text-center justify-center h-[90%] w-full bg-gray-200 rounded-md">
                                <i class="fas fa-bus text-orange-600"></i>
                                <h1 class="font-bold">Bus Kenya</h1>
                            </div>
                        </div>
                        <div class="col-span-2 text-sm">
                            <div>Route: {{ $journey->origin }} to {{ $journey->destination }}</div>
                            <div>Start Time: {{ $journey->departure_time }}</div>
                            <div>Ticket Price: <b>KSh. {{ number_format($journey->price) }}</b></div>
                            <form method="POST" action="{{ route('bookings.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="journey_id" value="{{ $journey->id }}">
                                <button type="submit"
                                    class="w-full block text-center mx-auto py-2 px-2 bg-black rounded-md text-white hover:bg-orange-600 focus:bg-orange-600">
                                Book Now
                                </button>
                            </form>

                        </div>
                    </div>

                     @endforeach

                 </div>

     </div>



 </x-app-layout>
