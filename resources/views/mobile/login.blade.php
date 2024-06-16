<x-mobile-layout>

    <nav class="h-20 bg-yellow-600 bg-opacity-90 px-3 fixed top-0 w-full">
        <div class="flex items-center pt-10 text-white text-xl uppercase justify-between font-[Righteous]">
            <h1 class="font-semibold">School Bus</h1>
            <span class="text-white">
                <i class="fas fa-user-plus mr-2"></i>
            </span>
        </div>
    </nav>


    <main class="mt-[10vh] min-h-[80vh] mx-auto max-w-lg px-2">

        <div class="grid gap-2">

            @for ($i=0; $i<12; $i++)

            <div class="flex rounded-md border shadow-md py-8 px-2">
                <h1 class="text-2xl font-bold text-center">Welcome {{ $i }}</h1>
            </div>

            @endfor

        </div>

    </main>

</x-mobile-layout>
