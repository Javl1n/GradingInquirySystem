<div>
    <form wire:submit='submit'>
        <h1 class="font-bold">Add Grade</h1>
        <div class="">
            <x-input-label :value="__('Subjects')" />
            {{-- <x-text-input class="block mt-1 w-full" wire:model='middleName' required /> --}}
            <select wire:model="subject" class="mt-1 w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach (App\Models\Subject::get() as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->description }}</option>
                @endforeach
            </select>
        </div>  
        <div class="mt-4 grid grid-cols-5 gap-2">
            <div class="col-span-2">
                <x-input-label :value="__('School Year')" />
                <select wire:model="schoolYear" class="mt-1 w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @for ($i = 2022, $j = 2023; $i < 2024; $i++, $j++)
                        <option value="{{ $i }}">{{ $i }}-{{ $j }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-3">
                <x-input-label :value="__('Semester')" />
                <div class="mt-1 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
                    <label>
                        <input type="radio" value="1" class="peer hidden" name="semester" wire:model="semester">
                        
                        <div class="hover:bg-gray-50 flex items-center justify-between ps-3 py-2 border rounded-lg cursor-pointer text-sm border-gray-300 group peer-checked:border-blue-500 shadow-sm">
                            <h2 class="font-medium text-gray-700">1st</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-6 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </label>
                    <label>
                        <input type="radio" value="2" class="peer hidden" name="semester" wire:model="semester">
                        
                        <div class="hover:bg-gray-50 flex items-center justify-between ps-3 py-2 border rounded-lg cursor-pointer text-sm border-gray-300 group peer-checked:border-blue-500 shadow-sm">
                            <h2 class="font-medium text-gray-700">2nd</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-6 text-blue-600 invisible group-[.peer:checked+&]:visible">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="mt-4">
                <x-input-label :value="__('Midterm')" />
                <x-text-input class="block mt-1 w-full" wire:model='midterm' required />
            </div>
            <div class="mt-4">
                <x-input-label :value="__('Finals')" />
                <x-text-input class="block mt-1 w-full" wire:model='finals' required  />
            </div>
        </div>
        <button class="p-2 bg-blue-600 w-full mt-8 rounded-md text-white font-bold">
            Submit
        </button>
    </form>
</div>
