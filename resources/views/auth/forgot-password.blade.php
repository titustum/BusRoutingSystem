<x-app-layout>

    <div class="flex flex-col justify-center min-h-screen">

        <div class="w-[90%] mx-auto border shadow shadow-orange-600 px-4 py-6 rounded">


            <a href="/">
                <x-application-logo class="w-20 mx-auto h-20 mb-4 fill-current text-gray-500" />
            </a>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80">
                     {{ __('Email Password Reset Link') }}
                </button>
                <div class="mt-2">
                    {{__("Already have account?")}}
                    <a class="text-blue-600 hover:text-orange-600" href="/">Back Home</a>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>
