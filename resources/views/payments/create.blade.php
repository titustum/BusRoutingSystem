<x-app-layout header="Passenger">
    <div class="flex flex-col w-full h-screen p-4 my-16">
        <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
            {{ $journey->origin }} <i class="text-green-600 fas fa-arrow-right"></i> {{ $journey->destination }} PAYMENT
        </div>

        <div class="my-3">
            <img src="{{ asset('images/M-Pesa-logo.jpg') }}" alt="M-Pesa Logo" class="h-40 mx-auto rounded-md">
        </div>

        <div>
            @if (session('success'))
                <div class="p-3 text-green-600 bg-green-100 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-3 text-red-600 bg-red-100 rounded-md">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('mpesa.initiatePayment') }}" method="POST">
                @csrf
                <input type="hidden" name="journey_id" value="{{ $journey->id }}">

                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="phone_number" :value="__('M-Pesa Phone Number')" />
                    <x-text-input id="phone_number" class="block w-full mt-1" type="number" name="phone_number" :value="old('phone_number')" required
                    placeholder="e.g. 254712345667"/>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Amount -->
                <div class="mt-4">
                    <x-input-label for="amount" :value="__('Amount to Pay')" />
                    <x-text-input id="amount" class="block w-full mt-1" type="number" name="amount" value="{{ $journey->price }}" readonly />
                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                </div>

                <button type="submit" class="float-right px-6 py-3 mt-8 text-white bg-orange-600 rounded-md">Initiate M-Pesa Payment</button>
            </form>
        </div>
    </div>
</x-app-layout>
