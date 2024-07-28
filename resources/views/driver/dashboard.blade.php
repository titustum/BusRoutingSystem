<x-app-layout header="Driver">


   <div class="flex flex-col w-full h-screen p-4 my-16">

            <div class="text-orange-600 pb-3 border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                DRIVER | DASHBOARD
            </div>


            <div class="grid grid-cols-2 gap-4 p-3 mt-3">

                <a href="{{ route('journeys.create') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                    <div class="text-center">
                        <i class="fas fa-road fa-2x"></i>
                        <div class="mt-2">New Journey</div>
                    </div>
                </a>
                <a href="{{ route('journeys.index') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                    <div class="text-center">
                        <i class="fas fa-bus fa-2xl"></i>
                        <div class="mt-2">My Journeys</div>
                    </div>
                </a>
                <a href="{{ route('driver.view.bookings') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                    <div class="text-center">
                        <i class="fas fa-check fa-2xl"></i>
                        <div class="mt-2">Bookings</div>
                    </div>
                </a>
                <a href="{{ route('profile.edit') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                    <div class="text-center">
                        <i class="fas fa-user fa-2xl"></i>
                        <div class="mt-2">My Profile</div>
                    </div>
                </a>

            </div>



    </div>








</x-app-layout>
