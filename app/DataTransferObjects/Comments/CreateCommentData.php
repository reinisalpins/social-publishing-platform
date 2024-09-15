<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Comments;

class CreateCommentData
{
    public function __construct(
        public readonly int $postId,
        public readonly string $content,
        public readonly int    $userId,
    )
    {
    }
}
