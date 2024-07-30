<x-app-layout>

    <div class="flex flex-col justify-center min-h-screen">
        <form method="POST" action="{{ route('register') }}" class="w-[90%] mx-auto border shadow shadow-orange-600 px-4 py-6 rounded">

            <a href="/">
                <x-application-logo class="w-20 h-20 mx-auto mb-4 text-gray-500 fill-current" />
            </a>

            <h1 class="text-2xl font-bold text-center uppercase">Register</h1>

            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Select category')" />
                <select id="role" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" name="role" :value="old('role')" required />
                    <option value="passenger">Passenger</option>
                    <option value="driver">Driver</option>
                    <option value="admin">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block w-full mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block w-full mt-1"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <button type="submit" class="block w-full px-6 py-3 mx-auto mt-6 text-center text-white bg-black rounded-md hover:opacity-80">
                Sign Up
            </button>
            <div class="mt-2">
                {{__("Already have account?")}}
                <a class="text-blue-600 hover:text-orange-600" href="{{ route('login') }}">Login</a>
            </div>

        </form>
    </div>



</x-app-layout>










