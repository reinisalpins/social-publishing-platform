<?php

declare(strict_types=1);

namespace App\DataTransferObjects\Posts;

class UpdatePostData
{
    public function __construct(
        public readonly int    $postId,
        public readonly string $title,
        public readonly string $content,
        public readonly array  $categoryIds
    )
    {
    }
}
