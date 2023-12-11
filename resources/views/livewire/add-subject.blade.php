<div>
    <form wire:submit='submit'>
        <h1 class="font-bold">Add Subject</h1>
        <div class="mt-4">
            <x-input-label :value="__('Subject Code')" />
        <x-text-input class="block mt-1 w-full" wire:model='subjectCode' required />
        </div>
        <div class="mt-4">
            <x-input-label :value="__('Description')" />
            <x-text-input class="block mt-1 w-full" wire:model='description' required />
        </div>
        <button class="p-2 bg-blue-600 w-full mt-8 rounded-md text-white font-bold">
            Submit
        </button>
    </form>
</div>
