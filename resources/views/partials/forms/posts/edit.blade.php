<form class="w-full space-y-4" action="{{ route('posts.update', ['post_id' => $post->getId()]) }}" method="POST">
    @csrf
    @method('PATCH')
    <x-ui.input name="title" label="Title" id="title" placeholder="Post title" required :value="$post->getTitle()"/>
    <x-ui.textarea name="content" label="Content" id="content" placeholder="Post content" required
                   :value="$post->getContent()"/>
    <x-ui.categorySelector
        :categories="$categories"
        :selectedCategories="$post->relatedCategories()->pluck('id')->toArray()"
    />
    <x-ui.button type="submit">
        Update Post
    </x-ui.button>
</form>



