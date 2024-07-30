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


            <!-- Bus Types -->
            <div class="mt-4">
                <x-input-label for="vehicle_type" :value="__('Bus Type/Capacity')" />

                <select id="vehicle_type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    name="vehicle_type" required>
                    <option value="">Select..</option>
                    <option value="14-24 Seater">14-24 Seater</option>
                    <option value="20-29 Seater">20-29 Seater</option>
                    <option value="30-39 Seater">30-39 Seater</option>
                    <option value="40-49 Seater">40-49 Seater</option>
                    <option value="50-59 Seater">50-59 Seater</option>
                    <option value="60-69 Seater">60-69 Seater</option>
                    <option value="Others">Others</option>
                </select>

                <x-input-error :messages="$errors->get('vehicle_type')" class="mt-2" />
            </div>

            <!-- Model -->
            <div class="mt-4">
                <x-input-label for="vehicle_model" :value="__('Bus Model')" />
                <select id="vehicle_model" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    name="vehicle_model" :value="old('vehicle_model')" required />
                    <option value="">Select..</option>
                    <option>Isuzu</option>
                    <option>Scannia</option>
                    <option>Toyota</option>
                    <option>Others</option>
                </select>
                <x-input-error :messages="$errors->get('vehicle_model')" class="mt-2" />
            </div>

            <!-- Model -->
            <div class="mt-4">
                <x-input-label for="vehicle_number" :value="__('Bus Number Plate')" />

                <x-text-input id="vehicle_number" class="block w-full mt-1"
                                type="text"
                                name="vehicle_number"
                                required autocomplete="vehicle_number" />

                <x-input-error :messages="$errors->get('vehicle_number')" class="mt-2" />
            </div>




            <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80">
                Complete Registration
            </button>

        </form>
    </div>



</x-app-layout>










