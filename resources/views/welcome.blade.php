<x-app-layout>

    <div class="h-screen w-full  flex flex-col p-4">
        <div class="mt-6 flex-grow">
            <h1 class="text-orange-600 uppercase text-2xl text-center font-bold font-['Righteous']">School Bus Booking</h1>

            <p class="mt-5 text-zinc-900 w-[90%] mx-auto">
                This is a bus trackig  routing system that lets passengers
                especially students to book tickets and
                pay for the seats prior to the time of travel.
            </p>

            <img src="{{ asset('images/school bus routing.webp') }}" alt="School Bus" class="mt-6">

        </div>
        <div class="shrink-0 grid gap-2 mb-4 w-[90%] mx-auto">

            @auth

            <a href="{{ route('dashboard') }}" class="block text-center py-3 px-6 bg-orange-600 rounded-md text-white hover:opacity-80">
                Go To Dashboard
            </a>

            @else
             <a href="{{ route('login') }}" class="block text-center py-3 px-6 bg-black rounded-md text-white hover:opacity-80">
                Login
            </a>
            <a href="{{ route('register') }}" class="block text-center py-3 px-6 bg-orange-600 rounded-md text-white hover:opacity-80">
                Create Account
            </a>
            @endauth


        </div>
    </div>

</x-app-layout>
