<x-app-layout header="smart">


    <div class="py-12 mt-10 px-6">
        <div class="">
            <div class="p-4 sm:p-8 bg-white shadow border rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 mt-4 sm:p-8 bg-white shadow border rounded-md">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="p-4 bg-white shadow border rounded-md">
                @csrf
                <button type="submit" name="logout" class="w-full block text-center mx-auto py-3 px-6 bg-red-600 rounded-md text-white hover:opacity-80">
                    Logout
                </button>

                {{-- <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div> --}}
            </form>
        </div>
    </div>
</x-app-layout>
