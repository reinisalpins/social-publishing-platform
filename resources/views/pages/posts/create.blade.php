<x-layouts.authenticated>
    <h1 class="font-bold text-2xl mb-6">Create Post</h1>
    <div>
        @include('partials.forms.posts.create', ['categories' => $categories])

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
