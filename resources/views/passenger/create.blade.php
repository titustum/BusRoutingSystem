<x-app-layout>

    <div class="flex flex-col justify-center min-h-screen">
        <form method="POST" action="{{ route('passenger.store') }}" class="w-[90%] mx-auto border shadow shadow-orange-600 px-4 py-6 rounded">

            <a href="/">
                <x-application-logo class="w-20 h-20 mx-auto mb-4 text-gray-500 fill-current" />
            </a>

            <h1 class="text-2xl font-bold text-center uppercase">Parent: {{ Auth::user()->name }}</h1>

            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

            <!-- Child Name -->
            <div>
                <x-input-label for="child_name" :value="__('Child Name')" />
                <x-text-input id="child_name" class="block w-full mt-1" type="text" name="child_name" :value="old('child_name')" required autofocus autocomplete="child_name" />
                <x-input-error :messages="$errors->get('child_name')" class="mt-2" />
            </div>

            <!-- Child Age -->
            <div class="mt-4">
                <x-input-label for="child_age" :value="__('Child age')" />
                <x-text-input id="child_age" class="block w-full mt-1" type="number" name="child_age"
                    :value="old('child_age')"
                    required autocomplete="child_age" />
                <x-input-error :messages="$errors->get('child_age')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="child_school" :value="__('Child school')" />
                <x-text-input id="child_school" class="block w-full mt-1" type="text" name="child_school"
                    :value="old('child_school')"
                    required autocomplete="child_school" />
                <x-input-error :messages="$errors->get('child_school')" class="mt-2" />
            </div>


            <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80">
                Complete Registration
            </button>

        </form>
    </div>



</x-app-layout>










