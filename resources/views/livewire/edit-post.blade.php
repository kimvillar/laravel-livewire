<div>
    <form wire:submit.prevent="update">
        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" class="mt-1 block w-full rounded-md p-2 border shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('title') border-red-500 @enderror" wire:model.deter="post.title">
                    @error('post.title') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Content</label>
                <div class="mt-1">
                    <textarea name="content" rows="3" class="mt-1 block w-full rounded-md p-2 border shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm @error('content') border-red-500 @enderror" wire:model.deter="post.content"></textarea>
                    @error('post.content') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        
        </div>
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm" wire:click.prevent="cancel()">Cancel</button>
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
        </div>
    </form>
</div>