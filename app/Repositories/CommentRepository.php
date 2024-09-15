<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\Comments\CreateCommentData;
use App\Models\Comment;

class CommentRepository
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly Comment        $comment
    )
    {
    }

    public function createComment(CreateCommentData $data): void
    {
        $post = $this->postRepository->getById($data->postId);

        $post->comments()->create([
            'user_id' => $data->userId,
            'content' => $data->content,
        ]);
    }

    public function deleteComment(int $commentId): void
    {
        $comment = $this->comment->findOrFail($commentId);

        $comment->delete();
    }
}
