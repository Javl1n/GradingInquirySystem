<div>
    <form wire:submit='submit'>
        <h1 class="font-bold">Add Student</h1>
        <div class="mt-4">
            <x-input-label :value="__('School ID')" />
        <x-text-input class="block mt-1 w-full" wire:model='schoolId' required />
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Course')" />
            {{-- <x-text-input class="block mt-1 w-full" wire:model='middleName' required /> --}}
            <select wire:model="course" class="mt-1 w-full border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @foreach (App\Models\Course::get() as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>  
        <div class="mt-4">
            <x-input-label :value="__('First Name')" />
            <x-text-input class="block mt-1 w-full" wire:model.live='firstName' required />
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Middle Name')" />
            <x-text-input class="block mt-1 w-full" wire:model='middleName' required />
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Last Name')" />
            <x-text-input class="block mt-1 w-full" wire:model.live='lastName' required />
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Password')" />
            <x-text-input class="block mt-1 w-full" wire:model='password' value="{{ $password }}" required :disabled='true' />
            {{-- <div class="ps-3 py-2 h-10 border mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $password }}</div> --}}
        </div>
        <button class="p-2 bg-blue-600 w-full mt-8 rounded-md text-white font-bold">
            Submit
        </button>
    </form>
</div>
