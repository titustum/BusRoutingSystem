<x-app-layout header="Admin">


    <div class="flex flex-col w-full h-screen p-4 my-16">

             <div class="text-orange-600 pb-3 flex items-center justify-between border-b-2 border-orange-600 text-xl text-center uppercase font-['Righteous']">
                <a href="{{ route('dashboard') }}" class="text-sm text-black"><i class="mr-1 fas fa-arrow-left"></i>Back</a>
                ADMIN | VIEW DRIVERS
                <div></div>
             </div>


             <div class="max-w-full mt-4 overflow-x-auto">
                <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                  <thead class="bg-orange-200">
                    <tr>
                      <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">ID</th>
                      <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Name</th>
                      <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Email</th>
                      <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-600 uppercase">Role</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    <tbody class="divide-y divide-gray-200">
                        @foreach($drivers as $user)
                          <tr class="hover:bg-gray-50">
                            <td class="px-4 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-4 py-4 whitespace-nowrap">{{ $user->role }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                  </tbody>
                </table>
              </div>



     </div>

 </x-app-layout>
