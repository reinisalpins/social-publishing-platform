<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Repositories\PostRepository;
use Closure;
use Illuminate\Http\Request;

class CheckPostOwnership
{
    public function __construct(
        private readonly PostRepository $postRepository
    )
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $postId = (int)$request->route('post_id');
        $post = $this->postRepository->getById($postId);

        if ($request->user()->getId() !== $post->getUserId()) {
            abort(403, 'Unauthorized action');
        }

        return $next($request);
    }
}
