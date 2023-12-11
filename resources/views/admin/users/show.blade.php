<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Grades') }}
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
                <div class="mt-4 w-1/3">
                    <div class=" bg-white overflow-auto shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="flex flex-col">
                                <div class="sm:mx-0.5 lg:mx-0.5">
                                    <livewire:add-grade :student="$student" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col w-2/3">
                    @if (count($gradeYear = $student->grades) !== 0)
                        @for($yearStart = 2022, $yearEnd = 2023; $yearStart <= 2024; $yearStart++, $yearEnd++)
                            @for($semester = 1; $semester <= 2; $semester++)
                                @if(count($grades = $gradeYear->where('school_year', $yearStart)->where('semester', $semester)) !== 0)
                                    <div class="mt-4 col-span-3 bg-white overflow-hidden overflow-y-auto shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <div class="flex flex-col">
                                                <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                                    <div class="py-2 inline-block min-w-full">
                                                        <h1>School Year: {{ $yearStart }}-{{ $yearEnd }}, Semester: {{ $semester === 1 ? '1st' : '2nd' }}</h1>
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
                                @endif
                            @endfor
                        @endfor
                    @else
                        <div class="mx-auto mt-10 text-gray-500 text-lg font-bold">
                            No records found
                        </div>
                    @endif                    
                </div>                
            </div>
        </div>
    </div>
</x-app-layout>
