<x-layouts.authenticated>
    <div class="mb-4 pb-4 border-b">
        <h1 class="font-bold text-2xl">{{$post->getTitle()}}</h1>
    </div>
    <div class="mb-4 pb-4 border-b">
        <p>{{$post->getContent()}}</p>
    </div>
    <div class="mb-4 pb-4">
        <h1 class="font-bold text-lg">Comments ({{$post->getCommentsCount()}}) </h1>
        <div class="border-b">
            @include('partials.forms.posts.createComment', ['post' => $post])
            @if($errors->createComment->any())
                <x-ui.alert type="error" title="Error" class="mb-4">
                    <ul>
                        @foreach ($errors->createComment->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-ui.alert>
            @endif
        </div>
        @forelse($post->relatedComments() as $comment)
            @include('partials.cards.posts.comment', ['comment' => $comment])
        @empty
            <x-ui.alert type="warning" title="Info" class="w-full mt-4">
                <p>No comments found</p>
            </x-ui.alert>
        @endforelse
    </div>
</x-layouts.authenticated>
