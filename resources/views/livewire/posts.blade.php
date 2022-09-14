<div>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-xl font-semibold leading-tight text-gray-800 mb-2"> POSTS </h1>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <div class="mb-2">
                        <button class="px-4 py-2 bg-green-500 text-white rounded mb-4" onclick="Livewire.emit('openModal', 'add-post')">ADD</button>
                    </div>
                    <div
                        class="relative overflow-x-auto shadow-md sm:rounded-lg"
                    >
                        <table
                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-200 uppercase bg-gray-600"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Content
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                        Author
                                    </th> --}}
                                    <th scope="col" class="px-6 py-3"></th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($posts) > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ $post->id }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ $post->title }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-700">
                                                {{ $post->content }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button wire:click="$emit('openModal', 'edit-post', {{ json_encode([$post]) }})" class="px-4 py-2 text-white bg-blue-500 rounded">EDIT</button>
                                            </td>
                                            <td class="px-6 py-4">
                                                <button onclick="deletePost({{$post->id}})" class="bg-red-700 px-4 py-2 text-white rounded">DELETE</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                    
                                @else
                                    <tr>
                                        <td class="px-6 py-4 text-gray-700" colspan="5" align="center">
                                            No Post Found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                    
                    <div class="py-5">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deletePost',id);
        }
    </script>
</div>
