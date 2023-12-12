<div>
    <form wire:submit='submit'>
        <h1 class="font-bold">Add Course</h1>
        <div class="mt-4">
            <x-input-label :value="__('Title')" />
            <x-text-input class="block mt-1 w-full" wire:model='name' required />
        </div>
        <button class="p-2 bg-blue-600 w-full mt-8 rounded-md text-white font-bold">
            Submit
        </button>
    </form>
</div>
