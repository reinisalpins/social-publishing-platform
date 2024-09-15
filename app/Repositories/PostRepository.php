<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\Posts\CreatePostData;
use App\DataTransferObjects\Posts\UpdatePostData;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

        $post->categories()->attach($data->categoryIds);

        return $post;
    }

    /** @return Collection<Post> */
    public function getPostsWithCategoriesByUserId(int $userId): Collection
    {
        return $this->post
            ->where('user_id', '=', $userId)
            ->with(['categories', 'user'])
            ->get();
    }

    public function delete(int $postId): bool
    {
        $post = $this->post->findOrFail($postId);

        return $post->delete();
    }

    public function update(UpdatePostData $data): Post
    {
        $post = $this->getById($data->postId);

        $payload = [
            'title' => $data->title,
            'content' => $data->content,
        ];

        $post->update($payload);

        $post->categories()->sync($data->categoryIds);

        return $post->fresh();
    }

    /** @return Collection<Post> */
    public function getAllPosts(): Collection
    {
        return $this->post
            ->with(['comments', 'categories', 'user'])
            ->get();
    }

    /** @return Collection<Post> */
    public function getByCategory(Category $category): Collection
    {
        return $this->post
            ->whereRelation('categories', 'category_id', '=', $category->getId())
            ->with(['comments', 'categories', 'user'])
            ->get();
    }

    /** @return Collection<Post> */
    public function search(string $term): Collection
    {
        return $this->post
            ->where('title', 'like', "%$term%")
            ->orWhere('content', 'like', "%$term%")
            ->with(['comments', 'categories', 'user'])
            ->get();
    }

    public function getPostWithCommentsById(int $postId): Post|Model
    {
        return $this->post->with('comments')->findOrFail($postId);
    }
}
