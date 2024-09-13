@props(['categories', 'post'])

<form class="w-full space-y-4" action="{{ route('posts.create', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <x-ui.input :value="$post->title" name="title" label="Title" id="title" placeholder="Post title" required/>
    <x-ui.textarea name="content" label="Content" id="content" placeholder="Post content" required
                   :value="$post->content"/>
    <x-ui.select
        name="categories"
        label="Categories"
        :options="$categories"
        placeholder="Select categories"
        :multiple="true"
        required
        :value="$post->categoriesRelation->pluck('id')->toArray()"
    />
    <x-ui.primary-button type="submit">
        Update Post
    </x-ui.primary-button>
</form>
