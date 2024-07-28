<x-app-layout header="Driver">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                 JOURNEY | PAYMENTS
             </div>

             <div class="text-lg font-bold ">{{ $journey->origin }} - {{ $journey->destination }}</div>


             <div class="grid gap-3 px-4 py-4 border-t border-orange-600">
                    @foreach ($journey->payments as $payment)
                    <div class="p-3 border rounded-md">
                            <div class="text-lg font-bold ">Phone: {{ $payment->phone_number }}</div>
                            <div>Amount: Ksh. {{ number_format($payment->amount) }}</div>
                            <div>Code: {{ $payment->transaction_code }}</div>
                            <div>Status: {{ $payment->status }}</div>
                    </div>
                    @endforeach

             </div>




     </div>


 </x-app-layout>
