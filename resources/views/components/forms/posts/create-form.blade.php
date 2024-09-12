@php
    $categories = [
        1 => 'Technology',
        2 => 'Travel',
        3 => 'Food',
        4 => 'Lifestyle',
        5 => 'Sports',
        6 => 'Fashion',
        7 => 'Health',
        8 => 'Business',
    ];
@endphp

<form class="w-full space-y-4" action="{{ route('posts.store') }}"  method="POST">
    @csrf
    <x-ui.input name="title" label="Title" id="title" placeholder="Post title" required/>
    <x-ui.textarea name="content" label="Content" id="content" placeholder="Post content" required/>
    <x-ui.select
        name="categories"
        label="Categories"
        :options="$categories"
        placeholder="Select categories"
        :multiple="true"
        required
    />
    <x-ui.primary-button type="submit">
        Save Post
    </x-ui.primary-button>
</form>
