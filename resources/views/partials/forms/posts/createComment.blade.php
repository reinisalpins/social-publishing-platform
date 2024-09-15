<form class="mt-4 space-y-4 pb-4" method="POST"
      action="{{route('posts.comments.store', ['post_id' => $post->getId()])}}">
    @csrf
    <x-ui.textarea name="comment" label="Add comment" placeholder="Your comment"/>
    <x-ui.button type="submit">Add comment</x-ui.button>
</form>
