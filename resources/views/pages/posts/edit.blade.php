<x-layouts.authenticated>
    <h1 class="font-bold text-2xl mb-6">Edit post</h1>
    <div class="flex p-6 shadow-sm border border-neutral-300 rounded-md mx-auto flex-col">
        <x-forms.posts.edit-form :categories="$categories" :post="$post"/>
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
