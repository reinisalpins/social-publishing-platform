<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\CreatePostData;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    public function __construct(
        private readonly Post $post
    )
    {
    }

    public function getById(int $id): Post
    {
        return $this->post->findOrFail($id);
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

    public function getPostsWithCategoriesByUserId(int $userId): Collection
    {
        return $this->post
            ->where('user_id', '=', $userId)
            ->with('categoriesRelation')
            ->get();
    }

    public function delete(int $postId): bool
    {
        $post = $this->post->findOrFail($postId);

        return $post->delete();
    }
}
