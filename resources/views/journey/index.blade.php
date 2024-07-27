<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

        <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
            {{ Auth::user()->journeys->count() ?? 0 }} | DRIVER JOURNEYS
        </div>

        {{-- You recently added jourmeys --}}

        <div class="my-5 ">
            <h1 class="py-3 border-b border-orange-600">Your recently added travels</h1>

            <div class="grid gap-3 mt-4">

                @empty(Auth::user()->journeys)

                You have no journeys

                @else
                    @foreach (Auth::user()->journeys  as $journey)

                        <div class="grid grid-cols-3 gap-3 p-3 border rounded-md shadow">
                            <div>
                                <div class="flex flex-col justify-center w-full h-full text-center bg-gray-200 rounded-md">
                                    <h1 class="text-2xl font-bold text-green-600">{{ $journey->bookings()->count() }}</h1>
                                    <div>Booked</div>

                                </div>
                            </div>
                            <div class="col-span-2 text-sm">
                                <div>Route: {{$journey->origin}} to {{$journey->destination}}</div>
                                <div>
                                    Departure: {{ \Carbon\Carbon::parse($journey->departure_date)->format('d-m-Y') }}
                                    {{ \Carbon\Carbon::parse($journey->departure_time)->format('H:s a') }}
                                </div>
                                <div>Ticket Price: <b>KSh. {{ number_format($journey->price) }}</b> </div>
                                <button type="submit"
                                    class="block w-full px-2 py-2 mx-auto text-center text-white bg-black rounded-md hover:opacity-80 focus:opacity-80">
                                    View bookings
                                </button>
                            </div>
                        </div>

                        @endforeach

                @endempty



            </div>

        </div>



 </x-app-layout>
