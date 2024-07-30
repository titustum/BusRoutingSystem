<x-app-layout header="smart">

    <div class="px-6 py-12 mt-10">

        <div class="text-orange-600 pb-3 flex items-center justify-between border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
            <a href="{{ route('dashboard') }}" class="text-sm text-black"><i class="mr-1 fas fa-arrow-left"></i>Back</a>
            {{ Auth::user()->name }} | PROFILE
            <div></div>
         </div>

        <div class="mt-4">
            <div class="p-4 bg-white border rounded-md shadow sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 mt-4 bg-white border rounded-md shadow sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="p-4 bg-white border rounded-md shadow">
                @csrf
                <button type="submit" name="logout" class="block w-full px-6 py-3 mx-auto text-center text-white bg-red-600 rounded-md hover:opacity-80">
                    Logout
                </button>

                {{-- <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div> --}}
            </form>
        </div>
    </div>
</x-app-layout>
