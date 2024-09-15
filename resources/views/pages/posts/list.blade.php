<x-layouts.authenticated>
    @include('partials.forms.feed.search')

    @if(isset($category))
        <h1 class="font-bold text-2xl mb-10">{{$category->getName()}}</h1>
    @endif

    @if(isset($term))
        <h1 class="font-bold text-2xl mb-10">Search results for term: {{$term}}</h1>
    @endif

    @if(isset($user))
        <h1 class="font-bold text-2xl mb-10">Posts by: {{$user->getName()}}</h1>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5">
        @forelse($posts as $post)
            @include('partials.cards.posts.post', ['post' => $post])
        @empty
            <x-ui.alert type="warning" title="Info" class="w-full col-span-3">
                <p>No Posts found</p>
            </x-ui.alert>
        @endforelse
    </div>
</x-layouts.authenticated>
