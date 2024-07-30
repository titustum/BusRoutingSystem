<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 flex items-center justify-between border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                <a href="{{ route('dashboard') }}" class="text-sm text-black"><i class="mr-1 fas fa-arrow-left"></i>Back</a>
                {{ $journeys->count() }} | AVAILABLE JOURNEYS
                <div></div>
             </div>

             {{-- You recently added jourmeys --}}

             <div class="my-5 ">
                 <h1 class="py-3 border-b border-orange-600">Your recently added travels</h1>

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
                            <form method="POST" action="{{ route('bookings.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="journey_id" value="{{ $journey->id }}">
                                <button type="submit"
                                    class="block w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-md hover:bg-orange-600 focus:bg-orange-600">
                                Book Now
                                </button>
                            </form>

                        </div>
                    </div>

                     @endforeach

                 </div>

     </div>



 </x-app-layout>
