<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Requests') }}
     </h2>
     </x-slot>

     <div class="py-12">
     <div class="flex gap-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="w-1/3">
               <div class=" bg-white overflow-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                         <div class="flex flex-col">
                         <div class="sm:mx-0.5 lg:mx-0.5">
                              <livewire:send-request />
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="w-2/3 col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                         <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                         <div class="py-2 inline-block min-w-full">
                              <div class="overflow-hidden">
                                   <table class="min-w-full">
                                        <thead class="bg-gray-200 border-b">
                                        <tr>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Semester Requested
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Status
                                             </th>
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Date Requested
                                             </th>
                                             </th>
                                             <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                  Date Accepted/Declined
                                             </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach (auth()->guard('student')->user()->requests as $request)                                             
                                             <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       @if ($request->accepted !== null && $request->accepted)
                                                            <a href="{{ route('student.requests.show', $request->id) }}">{{ $request->semester === 1 ? '1st sem.' : '2nd sem.' }}, s.y. {{ $request->school_year }}-{{ ++$request->school_year }}</a>
                                                       @else
                                                       {{ $request->semester === 1 ? '1st sem.' : '2nd sem.' }}, s.y. {{ $request->school_year }}-{{ ++$request->school_year }}
                                                       @endif
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
                                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                       {{ date_format($request->created_at, 'F d, Y') }}
                                                  </td>
                                                  <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-900">
                                                       {{ $request->date_decided ?? 'pending' }}
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
