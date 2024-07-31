<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 flex items-center justify-between border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600"><i class="mr-1 fas fa-arrow-left"></i>Back</a>
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
                                @if ($journey->driver)
                                    <h1 class="font-bold">{{ $journey->driver->company_name }}</h1>
                                    <h1 class="text-sm">{{ $journey->driver->vehicle_number }}</h1>
                                @else
                                    <h1 class="font-bold">Bus Kenya</h1>
                                @endif
                            </div>
                        </div>
                        <div class="col-span-2 text-sm">
                            <div>Route: <b>{{ $journey->origin }} to {{ $journey->destination }}</b></div>
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



 </x-app-layout>
