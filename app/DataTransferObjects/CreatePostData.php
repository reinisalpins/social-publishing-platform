<?php

declare(strict_types=1);

namespace App\DataTransferObjects;

class CreatePostData
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly int    $userId,
        public readonly array  $categoryIds
    )
    {
    }
}
