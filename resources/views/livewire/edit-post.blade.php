<div>
    <div class="py-3 px-5 border-b border-gray-200">
        <h3 class="text-gray-700 font-semibold">EDIT POST</h3>
    </div>
    <form wire:submit.prevent="update">
        
        <input type="hidden" wire:model="post_id">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" class="mt-1 block w-full rounded-md p-2 border shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('title') border-red-500 @enderror" wire:model.deter="title">
                    @error('title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Content</label>
                <div class="mt-1">
                    <textarea name="content" rows="3" class="mt-1 block w-full rounded-md p-2 border shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('content') border-red-500 @enderror" wire:model.deter="content"></textarea>
                    @error('content') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Image</label>
                <div class="mt-1">
                    <input type="file" name="image" wire:model.deter="image" class="mt-1 block w-full rounded-md p-2 border shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('image') border-red-500 @enderror">
                    @error('image') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            
            @if (!empty($db_image))
                <div class="relative w-full">
                    <img
                        src="{{ asset('storage/'.$db_image) }}"
                        class="max-w-full h-auto"
                        alt="{{ $title }}"
                    />
                    <button wire:click.prevent="destroyImage()" class="absolute inline -top-2 -right-2 px-2 py-1 border-2 border-white bg-gray-500 text-white rounded-full font-sans text-xs">X</button>
                </div>
            @endif
            @if ($image && empty($db_image))
                <div class="relative w-full">
                    <h3 class="text-gray-700 mb-1 font-semibold">PHOTO PREVIEW</h3>
                    <img class="max-w-full h-auto rounded" src="{{ $image ? $image->temporaryUrl() : '' }}">
                </div>
            @endif
        
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm" wire:click.prevent="cancel()">Cancel</button>
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
        </div>
    </form>
</div>