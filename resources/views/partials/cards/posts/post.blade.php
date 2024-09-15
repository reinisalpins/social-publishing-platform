<div class="flex flex-col gap-4 border rounded-md border-neutral-300 p-4">
    <div class="w-full flex justify-between">
        <span class="uppercase text-sm font-bold text-primary-800">{{ $post->getCreatedAt()->format('F jS Y') }}</span>
        <div class="uppercase text-sm font-bold text-primary-800 flex items-center gap-1">
            <span class="pt-0.5">{{ $post->getCommentsCount() }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                 class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                <path
                        d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </div>
    </div>
    <div class="flex flex-wrap gap-2">
        @foreach($post->relatedCategories() as $category)
            <a href="{{route('posts.category', ['slug' => $category->getSlug()])}}" class="text-xs border py-1 px-2 text-white bg-primary-800 rounded-xl">{{ $category->getName() }}</a>
        @endforeach
    </div>
    <h1 class="font-bold text-lg">{{ $post->getTitle() }}</h1>
    <p>{{ Str::limit($post->getContent(), 50) }}</p>
        <span class="text-sm">Author: <b><a class="underline" href="{{route('posts.user', ['user_id' => $post->relatedUser()->getId()])}}">{{ $post->relatedUser()->getName() }}</a></b></span>
    <a class="font-bold underline" href="{{route('posts.show', ['post_id' => $post->getId()])}}">Read More</a>
</div>
