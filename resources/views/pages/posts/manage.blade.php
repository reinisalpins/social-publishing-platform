<x-layouts.authenticated>
    @if(session('success'))
        <x-ui.alert type="success" title="Success" class="mb-7">
            {{session('success')}}
        </x-ui.alert>
    @endif

    @if($errors->any())
        <x-ui.alert type="error" title="Error" class="mb-7">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-ui.alert>
    @endif
    <div class="flex gap-7 flex-wrap w-full justify-between items-center">
        <h1 class="font-bold text-2xl">Manage Posts</h1>
        <a
                href="{{route('posts.create')}}"
                class="flex justify-center rounded-md bg-primary-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-700"
        >
            Create Post
        </a>
    </div>
    <div class="mb-7 pt-7 space-y-4">
        @forelse($posts as $post)
            @include('partials.cards.posts.manage', ['post' => $post])
        @empty
            <x-ui.alert type="warning" title="Info" class="w-full col-span-3 mt-7">
                <p>No Posts found</p>
            </x-ui.alert>
        @endforelse
    </div>
</x-layouts.authenticated>
