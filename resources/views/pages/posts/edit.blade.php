<x-layouts.authenticated>
    @if(session('success'))
        <x-ui.alert type="success" title="Success" class="mb-7">
            {{session('success')}}
        </x-ui.alert>
    @endif

    <h1 class="font-bold text-2xl mb-6">Edit post</h1>
    <div>
        @include('partials.forms.posts.edit', ['post' => $post, 'categories' => $categories])

        @if($errors->any())
            <x-ui.alert class="mt-5" type="error">
                <x-slot:title>
                    There were some errors
                </x-slot:title>
                <ul class="flex flex-col gap-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert>
        @endif
    </div>
</x-layouts.authenticated>
