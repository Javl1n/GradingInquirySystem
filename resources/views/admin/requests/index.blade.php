<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Requests') }}
     </h2>
     </x-slot>

     <div class="py-12">
     <div class="flex flex-col gap-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="w-full col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                         <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                         <div class="py-2 inline-block min-w-full">
                              <div class="overflow-hidden">
                                   Requests received today: <span class="font-bold">{{ \App\Models\Request::whereDate('created_at', \Illuminate\Support\Carbon::today())->get()->count() }}</span><br>
                                   </div>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="w-full col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                         <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                         <div class="py-2 inline-block min-w-full">
                              <div class="overflow-hidden">
                                   <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                        <tr>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Student Name
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Course
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Date Requested
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Status
                                             </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($requests as $request)
                                             <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       <a href="{{ route('admin.requests.show', [$request->id]) }}">{{ $request->student->name }}</a>
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       {{ $request->student->course->name }}
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       {{ date_format($request->created_at, 'F d, Y') }}
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       @if($request->accepted !== null)
                                                            @if ($request->accepted)
                                                                 <span class="text-green-500">accepted</span>
                                                            @else
                                                                 <span class="text-red-500">declined</span>
                                                            @endif
                                                       @else
                                                            <span class="text-blue-500">pending</span>
                                                       @endif
                                                  </td>
                                             </tr>
                                        @endforeach
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     </div>
</x-app-layout>
