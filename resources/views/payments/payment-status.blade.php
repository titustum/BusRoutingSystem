<x-app-layout header="Passenger">


    <div class="flex flex-col justify-center w-full h-screen p-4 my-16">

        <div class="px-4">

            <div class="text-green-600">Your payment has been received successfully. Wait for our confirmation and notification</div>


            <div class="flex justify-between mt-6">
                <a href="{{ route('passenger.dashboard') }}" class="px-4 py-2 text-white bg-black rounded-lg hover:opacity-80">Back To Home</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:opacity-80">Logout</button>
                </form>
            </div>

        </div>

    </div>

 </x-app-layout>
