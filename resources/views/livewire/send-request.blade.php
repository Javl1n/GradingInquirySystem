<div>
    <form wire:submit='submit' enctype="multipart/form-data">
        <h1 class="font-bold">Send Request</h1>  
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
        <div class="mt-4 flex h-full flex-col" x-data="imageViewer()">
            <x-input-label for="validation" :value="__('Subject Load')" />
            <div class="flex gap-2">
                <div class="flex-1 mt-1 rounded-md border border-dashed border-gray-300 relative">
                    <input type="file" wire:model='subjectLoad' accept="image/*" @change="fileChosen" class="cursor-pointer relative block opacity-0 w-full h-full p-12 z-50">
                    <div class="text-center mt-6 absolute top-0 right-0 left-0 m-auto">
                        <h4>
                            Drop files anywhere to upload
                            <br/>or
                        </h4>
                        <p class="">Select Files</p>
                    </div>
                </div>
            </div>
            <div class="mt-2 flex-1">
                <template class="" x-if="imageUrl">
                    <div class="flex flex-col justify-center h-full">
                        <img :src="imageUrl"
                             class="h-48 object-contain rounded border border-gray-200"
                             {{-- style="width: 100px; height: 100px;" --}}
                        >
                    </div>
                </template>
                <!-- Show the gray box when image is not available -->
                <template x-if="!imageUrl">
                    <div
                        class="border rounded border-gray-200 bg-gray-100 h-48"
                        {{-- style="width: 100px; height: 100px;" --}}
                    ></div>
                </template>
            </div>
            <x-input-error :messages="$errors->get('profile')" class="mt-2" />
        </div>  
        <button class="p-2 bg-blue-600 w-full mt-8 rounded-md text-white font-bold">
            Submit
        </button>
    </form>
</div>
