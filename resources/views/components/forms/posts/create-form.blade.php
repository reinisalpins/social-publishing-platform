@props(['categories'])

<form class="w-full space-y-4" action="{{ route('posts.store') }}" method="POST">
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
