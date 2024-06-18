<x-app-layout>

    <div class="flex flex-col justify-center min-h-screen">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }} "
            class="w-[90%] mx-auto border shadow shadow-orange-600 px-4 py-6 rounded">

            <a href="/">
                <x-application-logo class="w-20 mx-auto h-20 mb-4 fill-current text-gray-500" />
            </a>

            <h1 class="text-2xl font-bold text-center uppercase">LOGIN</h1>

            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80">
                Signin
            </button>
            <div class="mt-2">
                {{__("Don't have account yet?")}}
                <a class="text-blue-600 hover:text-orange-600" href="{{ route('register') }}">Signup</a>
            </div>
            {{-- <div class="mt-2">
                {{__("Forgot password?")}}
                <a class="text-blue-600 hover:text-orange-600" href="{{ route('password.request') }}">Reset</a>
            </div> --}}

        </form>

    </div>

</x-app-layout>
