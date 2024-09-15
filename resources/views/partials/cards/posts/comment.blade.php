<div class="flex">
    <div class="mt-4 pb-4 border-b flex-1">
        <div class="flex items-center text-sm ">
            <span>Author: {{$comment->relatedUser()->getName()}}</span>
            <span class="mx-2">|</span>
            <span>Created: {{ $comment->getCreatedAt()->toDateTimeString('minute') }}</span>
            @if(Auth::user()->getId() === $comment->getUserId())
                <span class="mx-2">|</span>
                <form method="POST"
                      action="{{route('posts.comments.destroy', ['comment_id' => $comment->getId()])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="underline text-sm ">Delete comment</button>
                </form>
            @endif
        </div>
        <p class="mt-4">{{$comment->getContent()}}</p>
    </div>
</div>
