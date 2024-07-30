<x-app-layout header="Admin">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                 ADMIN | DASHBOARD
             </div>


             <div class="grid grid-cols-2 gap-4 p-3 mt-3">

                 <a href="{{ route('admin.viewPassengers') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                     <div class="text-center">
                        <div class="text-xl font-bold text-green-600">{{ $passengers_count }}</div>
                         <div class="mt-2">Passengers Registered</div>
                     </div>
                 </a>
                 <a href="{{ route('admin.viewDrivers') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                     <div class="text-center">
                         <div class="text-xl font-bold text-green-600">{{ $drivers_count }}</div>
                         <div class="mt-2">Drivers registered</div>
                     </div>
                 </a>
                 <a href="{{ route('admin.viewJourneys') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                     <div class="text-center">
                         <div class="text-xl font-bold text-green-600">{{ $journeys_count }}</div>
                         <div class="mt-2">Journeys Created</div>
                     </div>
                 </a>
                 <a href="{{ route('admin.viewPayments') }}" class="min-h-[20vh] hover:bg-orange-200 transition-all duration-300 focus:bg-orange-200 border rounded-md shadow shadow-orange-600 flex flex-col justify-center">
                     <div class="text-center">
                        <div class="text-xl font-bold text-green-600">{{ $payments_count }}</div>
                        <div class="mt-2">Total Payments</div>
                     </div>
                 </a>

             </div>



     </div>








 </x-app-layout>
