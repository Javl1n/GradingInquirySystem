<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <div class="">
               <span class="font-bold">Requested by: </span>{{ $request->student->name }}
          </div>
          <div class="mt-2 text-lg font-thinx"><span>Course:</span> {{ $request->student->course->name }}</div>
     </h2>
     </x-slot>

     <div class="py-12">
     <div class="flex flex-col gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="mt-4 col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
               <div class="flex flex-col">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                         <div class="py-2 inline-block min-w-full">
                              <h1 class="text-lg font-bold">Requested Grades:</h1>
                              <h1 class="mb-4">School Year: {{ $request->school_year }}-{{ ++$request->school_year }}, Semester: {{ $request->semester === 1 ? '1st' : '2nd' }}</h1>
                              <div class="overflow-hidden">
                              <table class="min-w-full">
                                   <thead class="bg-gray-200 border-b">
                                   <tr>
                                   <th scope="" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                   Subject Code
                                   </th>
                                   <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                   Descriptive Title
                                   </th>
                                   <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                   Midterm
                                   </th>
                                   <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                   Finals
                                   </th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach ($grades as $grade)
                                   <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                             {{ $grade->subject->code }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             {{ $grade->subject->description }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             {{ $grade->midterm }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             {{ $grade->finals }}
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
          <div class="w-full col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                         <div class="font-bold text-lg">Subject Load</div>
                         <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                         <div class="py-2 inline-block min-w-full">
                              <div class="overflow-hidden">
                                   <img src="{{ asset($request->subject_load_url) }}" alt="">
                              </div>
                         </div>
                         </div>
                    </div>
               </div>
          </div>
          <livewire:request-buttons :request="$request" />
     </div>
     </div>
</x-app-layout>
