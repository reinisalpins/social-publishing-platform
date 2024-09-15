@props(['categories'])

<form class="w-full space-y-4" action="{{ route('posts.store') }}" method="POST">
    @csrf
    <x-ui.input name="title" label="Title" id="title" placeholder="Post title" required/>
    <x-ui.textarea name="content" label="Content" id="content" placeholder="Post content" required/>

    <x-ui.categorySelector :categories="$categories" />

    <x-ui.button type="submit">
        Save Post
    </x-ui.button>
</form>
