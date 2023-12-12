<x-app-layout>
     <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Grade') }}
     </h2>
     </x-slot>

     <div class="py-12">
     <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="w-full">
               <div class=" bg-white overflow-auto shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                         <div class="flex flex-col">
                         <div class="sm:mx-0.5 lg:mx-0.5">
                              <h1 class="font-bold text-xl">
                                   {{ $student->name }}
                              </h1>
                              <div class="text-lg">Course: {{ $student->course->name }}</div>
                         </div>
                         </div>
                    </div>
               </div>
          </div> 
          <div class="flex gap-4">
               <div class="flex flex-col w-full">
                    <div class="mt-4 col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
                         <div class="p-6 text-gray-900">
                              <div class="flex flex-col">
                              <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                   <div class="py-2 inline-block min-w-full">
                                        <h1>School Year: {{ $schoolYear }}, Semester: {{ $semester === 1 ? '1st' : '2nd' }}</h1>
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
                                        @php
                                             $sum = 0;
                                             $i = 0;
                                             foreach ($grades as $grade) {
                                                  $sum += $grade->finals;
                                                  $i++;
                                             }
                                             $average = $sum / $i;
                                             if ($average >= 93 && $average <= 100) {
                                                  $response = 'Excellent';
                                             }
                                             elseif ($average >= 90  && $average <= 92) {
                                                  $response = 'Very Good';
                                             }
                                             elseif ($average >= 80 && $average <= 89) {
                                                  $response = 'Good';
                                             } elseif ($average >= 75 && $average <= 79) {
                                                  $response = 'Fair';
                                             } else {
                                                  $response = 'Failure';
                                             }
                                        @endphp
                                        </div>
                                        <h1 class="mt-6 text-lg">Average: <span class="font-bold">{{ $average }} - {{ $response }}</span></h1>
                                   </div>
                              </div>
                              </div>
                         </div>
                    </div>
          
               </div>                
          </div>
     </div>
     </div>
</x-app-layout>
