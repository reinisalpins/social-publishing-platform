<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        private readonly PostRepository     $postRepository,
        private readonly CategoryRepository $categoryRepository
    )
    {
    }

    public function manage(Request $request): View
    {
        return view('pages.posts.manage', [
            'posts' => $this->postRepository->getPostsWithCategoriesByUserId($request->user()->getId()),
        ]);
    }

    public function create(): View
    {
        return view('pages.posts.create', [
            'categories' => $this->categoryRepository->getAllCategories()->pluck('name', 'id'),
        ]);
    }

    public function edit(EditPostRequest $request): View
    {
        return view('pages.posts.edit', [
            'categories' => $this->categoryRepository->getAllCategories()->pluck('name', 'id'),
            'post' => $this->postRepository->getById($request->getPostId())
        ]);
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $this->postRepository->createPost($request->getData());

        return redirect()->route('posts.manage')->with('success', 'Post created successfully.');
    }

    public function destroy(DeletePostRequest $request): RedirectResponse
    {
        $this->postRepository->delete($request->getPostId());

        return redirect()->route('posts.manage')->with('success', 'Post deleted successfully.');
    }

//    public function update(UpdatePostRequest $request): RedirectResponse
//    {
//
//    }
}
