<div class="flex">
    <div class="mt-4 pb-4 border-b flex-1">
        <span class="text-sm font-bold">Author: {{$comment->relatedUser()->getName()}}</span>
        @if(Auth::user()->getId() === $comment->getUserId())
            <form method="POST"
                  action="{{route('posts.comments.destroy', ['comment_id' => $comment->getId()])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="underline text-sm mt-3 ">Delete comment</button>
            </form>
        @endif
        <p class="mt-4">{{$comment->getContent()}}</p>
    </div>
</div>
