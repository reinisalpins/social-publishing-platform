<div class="w-full border border-gray-300 p-3 rounded-md">
    <h2 class="text-xl font-semibold mb-2">{{ $post->getTitle() }}</h2>
    <p class="text-gray-600 mb-4">{{ Str::limit($post->getContent(), 50) }}</p>
    <div class="flex items-center text-sm text-gray-500">
        <span>Created: {{ $post->getCreatedAt()->toFormattedDateString() }}</span>
        <span class="mx-2">|</span>
        <span>Updated: {{ $post->getUpdatedAt()->toFormattedDateString() }}</span>
    </div>
    <div class="mt-4 space-x-2">
        @foreach ($post->relatedCategories() as $category)
            <a href="{{route('posts.category', ['slug' => $category->getSlug()])}}"
               class="text-xs border py-1 px-2 text-white bg-primary-800 rounded-xl">
                {{ $category->getName() }}
            </a>
        @endforeach
    </div>

    <div class="mt-6 space-x-6 items-center">
        <a href="{{ route('posts.show', ['post_id' => $post->getId()]) }}" class="text-sm font-bold hover:underline">
            View
        </a>
        <a href="{{ route('posts.edit', ['post_id' => $post->getId()]) }}" class="text-sm font-bold hover:underline">
            Edit
        </a>
        <form action="{{ route('posts.destroy', ['post_id' => $post->getId()]) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="text-sm font-bold hover:underline">
                Delete
            </button>
        </form>
    </div>
</div>
