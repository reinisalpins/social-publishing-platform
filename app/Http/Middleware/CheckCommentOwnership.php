<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Repositories\CommentRepository;
use Closure;
use Illuminate\Http\Request;

class CheckCommentOwnership
{
    public function __construct(
        private readonly CommentRepository $commentRepository,
    )
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $commentId = (int)$request->route('comment_id');
        $comment = $this->commentRepository->getById($commentId);

        if ($request->user()->getId() !== $comment->getUserId()) {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
}
