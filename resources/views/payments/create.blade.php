<x-app-layout header="Passenger">


    <div class="flex flex-col w-full h-screen p-4 my-16">

        <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
            {{ $journey->origin }} <i class="text-green-600 fas fa-arrow-right"></i>  {{ $journey->destination }} PAYMENT
         </div>

         <div class="my-3">
            <img src="{{ asset('images/M-Pesa-paybill-number.jpg') }}" alt="PayBill Number" class="h-40 mx-auto rounded-md">
         </div>

         <div>
            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="journey_id" value="{{ $journey->id }}">
                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="mobile_number" :value="__('Mobile Number')" />
                    <x-text-input id="mobile_number" class="block w-full mt-1" type="number" name="mobile_number" :value="old('mobile_number')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- transaction_code -->
                <div class="mt-4">
                    <x-input-label for="transaction_code" :value="__('Transaction Code')" />
                    <x-text-input id="transaction_code" class="block w-full mt-1" type="text" name="transaction_code" :value="old('transaction_code')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="amount" :value="__('Amount paid.')" />
                    <x-text-input id="amount" class="block w-full mt-1" type="number" name="amount" value="{{ $journey->price }}"  required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <button type="submit" class="float-right px-6 py-3 mt-8 text-white bg-orange-600 rounded-md">Submit Payment</button>
            </form>
         </div>

     </div>

 </x-app-layout>
