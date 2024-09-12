<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\CreatePostData;
use App\Models\Post;

class PostRepository
{
    public function __construct(
        private readonly Post $post
    )
    {
    }

    public function createPost(CreatePostData $data): Post
    {
        $payload = [
            'title' => $data->title,
            'content' => $data->content,
            'user_id' => $data->userId
        ];

        $post = $this->post->create($payload);

        $post->categoriesRelation()->attach($data->categoryIds);

        return $post;
    }
}
