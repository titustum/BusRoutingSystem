<x-app-layout header="Driver">


    <div class="h-screen w-full my-16 flex flex-col p-4">



             <form class="mt-3 p-3 shadow rounded-md border">

                <div class="text-orange-600 text-xl text-center uppercase font-['Righteous']">
                    DRIVER | CREATE JOURNEY
                </div>

                 @csrf

                 <!-- destination -->
                 <div class="mt-4">
                     <x-input-label for="usertype" :value="__('Select origin')" />
                     <select id="usertype" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="usertype" :value="old('usertype')" required />
                         <option>Mombasa</option>
                         <option>Nairobi</option>
                         <option>Bungoma</option>
                         <option>Kisumu</option>
                         <option>Eldoret</option>
                         <option>Nyeri</option>
                     </select>
                     <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                 </div>

                 <!-- destination -->
                 <div class="mt-4">
                     <x-input-label for="usertype" :value="__('Select destination')" />
                     <select id="usertype" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="usertype" :value="old('usertype')" required />
                         <option>Nairobi</option>
                         <option>Mombasa</option>
                         <option>Kisumu</option>
                         <option>Eldoret</option>
                         <option>Nyeri</option>
                     </select>
                     <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
                 </div>

                 <!-- Price -->
             <div class="mt-4">
                 <x-input-label for="price" :value="__('Price in Ksh.')" />
                 <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
             </div>

                 <!-- Time -->
             <div class="mt-4">
                 <x-input-label for="price" :value="__('Starting time')" />
                 <x-text-input id="price" class="block mt-1 w-full" type="time" name="price" :value="old('price')" required />
                 <x-input-error :messages="$errors->get('email')" class="mt-2" />
             </div>

                 <button type="submit" class="w-full mt-6 block text-center mx-auto py-3 px-6 bg-black rounded-md text-white hover:opacity-80 focus:opacity-80">
                    Create New Journey
                 </button>
             </form>



     </div>








 </x-app-layout>
