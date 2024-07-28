<x-app-layout>

    <div class="flex flex-col justify-center min-h-screen">
        <form method="POST" action="{{ route('driver.store') }}" class="w-[90%] mx-auto border shadow shadow-orange-600 px-4 py-6 rounded">

            <a href="/">
                <x-application-logo class="w-20 h-20 mx-auto mb-4 text-gray-500 fill-current" />
            </a>

            <h1 class="text-2xl font-bold text-center uppercase">Driver: {{ Auth::user()->name }}</h1>

            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <!-- Company Name -->
            <div>
                <x-input-label for="company_name" :value="__('Company Name')" />
                <x-text-input id="company_name" class="block w-full mt-1" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>

            <!-- Licence Number -->
            <div class="mt-4">
                <x-input-label for="license_number" :value="__('Licence Number')" />
                <x-text-input id="license_number" class="block w-full mt-1" type="text" name="license_number" :value="old('licence_number')" required autocomplete="licence_number" />
                <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
            </div>


            <!-- Model -->
            <div class="mt-4">
                <x-input-label for="vehicle_model" :value="__('Bus Model')" />

                <x-text-input id="vehicle_model" class="block w-full mt-1"
                                type="text"
                                name="vehicle_model"
                                required autocomplete="vehicle_model" />

                <x-input-error :messages="$errors->get('vehicle_model')" class="mt-2" />
            </div>

            <!-- Model -->
            <div class="mt-4">
                <x-input-label for="vehicle_registration_number" :value="__('Bus Registration Number')" />

                <x-text-input id="vehicle_registration_number" class="block w-full mt-1"
                                type="text"
                                name="vehicle_registration_number"
                                required autocomplete="vehicle_registration_number" />

                <x-input-error :messages="$errors->get('vehicle_registration_number')" class="mt-2" />
            </div>




            <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80">
                Complete Registration
            </button>

        </form>
    </div>



</x-app-layout>










