@props(['posts'])

<div class="relative overflow-x-auto mt-7 rounded-md border">
    <table class="w-full text-sm text-left text-gray-700">
        <thead class="text-sm text-white uppercase bg-primary-800">
        <tr>
            <th scope="col" class="px-4 py-3 min-w-[100px]">
                Id
            </th>
            <th scope="col" class="px-4 py-3 min-w-[100px]">
                Title
            </th>
            <th scope="col" class="px-4 py-3 min-w-[150px]">
                Categories
            </th>
            <th scope="col" class="px-4 py-3 min-w-[150px]">
                Created At
            </th>
            <th scope="col" class="px-4 py-3">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="bg-gray-200">
        @forelse($posts as $post)
            <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }}">
                <th class="px-4 py-4 font-medium">
                    {{ $post->id }}
                </th>
                <th class="px-4 py-4 font-medium">
                    {{ $post->title }}
                </th>
                <th class="px-4 py-4 font-medium">
                    <ul>
                        @foreach($post->categoriesRelation as $category)
                            <li>{{$category->name}}</li>
                        @endforeach
                    </ul>
                </th>
                <td class="px-4 py-4">
                    {{ $post->created_at->format('M d, Y H:i') }}
                </td>
                <td class="px-4 py-4">
                    <div class="flex space-x-2">
                        <form action="{{route('posts.destroy', ['post_id' => $post->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <x-ui.primary-button class="bg-red-700 hover:bg-red-600" type="submit">Delete</x-ui.primary-button>
                        </form>
                        <a href="{{route('posts.edit', ['post_id' => $post->id])}}">
                            <x-ui.primary-button type="submit">Edit</x-ui.primary-button>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-4 py-4 text-center">No posts found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
