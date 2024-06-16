<x-mobile-layout>

    <div class="h-screen w-full  flex flex-col p-4">
        <div class="py-10 flex-grow">
            <h1 class="text-orange-600 text-2xl text-center font-bold font-['Righteous']">School Bus Routing System</h1>

            <p class="mt-5 text-zinc-900">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt autem obcaecati consequatur tempore laboriosam possimus necessitatibus ipsam voluptatum, fugiat saepe perspiciatis odio quas quos aperiam sapiente iure beatae molestiae voluptatem.</p>


            <img src="{{ asset('images/shoolbus.jpg') }}" alt="School Bus" class="mt-6">

        </div>
        <div class="shrink-0 grid gap-2">
            <a href="{{ route('login') }}" class="w-[90%] block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80">
                Login
            </a>
            <a href="{{ route('register') }}" class="w-[90%] block text-center mx-auto py-3 px-6 bg-orange-600 rounded-md text-white hover:opacity-80">
                Create Account
            </a>
        </div>
    </div>

</x-mobile-layout>
