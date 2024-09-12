<x-layouts.authenticated>
    <h1 class="text-center font-bold text-2xl mb-6">
        @if(isset($category))
            Posts in {{ $category->name }}
        @else
            All Posts
        @endif
    </h1>
    <div class="max-w-4xl mx-auto">
        @foreach($posts as $post)
            <div class="mb-4 p-4 border rounded">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p class="text-gray-600">By {{ $post->user->name }} on {{ $post->created_at->format('F j, Y') }}</p>
                <p class="mt-2">{{ Str::limit($post->content, 200) }}</p>
                <a href="#" class="text-blue-500 hover:underline">Read more</a>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
</x-layouts.authenticated>
