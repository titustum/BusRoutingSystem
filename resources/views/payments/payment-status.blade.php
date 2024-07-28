<x-app-layout header="Passenger">
    <div class="mx-auto mt-24 w-[90%] border shadow-md rounded p-8">
        <h1 class="mb-4 text-2xl font-bold">Payment Status</h1>
        <div class="bg-white">
            <p>Payment ID: <b>{{ $payment->id }}</b></p>
            <p>Amount: <b>{{ $payment->amount }}</b></p>
            <p>Status: <b>{{ ucfirst($payment->status) }}</b></p>
            @if($payment->status == 'completed')
                <p>M-Pesa Receipt Number: {{ $payment->mpesa_receipt_number }}</p>
            @endif

            {{-- <div class="flex justify-between mt-6">
                <a href="{{ route('passenger.dashboard') }}" class="px-4 py-2 text-white bg-black rounded-lg hover:opacity-80">Back To Home</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:opacity-80">Logout</button>
                </form>
            </div> --}}
        </div>
    </div>
</x-app-layout>
