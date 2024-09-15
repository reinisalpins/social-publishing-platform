<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\DeletePostRequest;
use App\Http\Requests\Posts\EditPostRequest;
use App\Http\Requests\Posts\GetPostsByCategorySlugRequest;
use App\Http\Requests\Posts\GetPostsByUserIdRequest;
use App\Http\Requests\Posts\SearchPostsRequest;
use App\Http\Requests\Posts\ShowSinglePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        private readonly PostRepository     $postRepository,
        private readonly CategoryRepository $categoryRepository,
        private readonly UserRepository     $userRepository
    )
    {
    }

    public function index(): View
    {
        return view('pages.posts.list', [
            'posts' => $this->postRepository->getAllPosts()
        ]);
    }

    public function category(GetPostsByCategorySlugRequest $request): View
    {
        $category = $this->categoryRepository->getBySlug($request->getSlug());

        return view('pages.posts.list', [
            'posts' => $this->postRepository->getByCategory($category),
            'category' => $category
        ]);
    }

    public function search(SearchPostsRequest $request): View
    {
        return view('pages.posts.list', [
            'posts' => $this->postRepository->search($request->getTerm()),
            'term' => $request->getTerm()
        ]);
    }

    public function userPosts(GetPostsByUserIdRequest $request): View
    {
        $user = $this->userRepository->getById($request->getUserId());

        return view('pages.posts.list', [
            'posts' => $this->postRepository->getPostsWithCategoriesByUserId($user->getId()),
            'user' => $user
        ]);
    }

    public function create(): View
    {
        return view('pages.posts.create', [
            'categories' => $this->categoryRepository->getAllCategories(),
        ]);
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $post = $this->postRepository->createPost($request->getData());

        return redirect()->route('posts.edit', ['post_id' => $post->getId()])->with('success', 'Post created successfully.');
    }

    public function manage(Request $request): View
    {
        return view('pages.posts.manage', [
            'posts' => $this->postRepository->getPostsWithCategoriesByUserId($request->user()->getId()),
        ]);
    }

    public function show(ShowSinglePostRequest $request): View
    {
        return view('pages.posts.show', [
            'post' => $this->postRepository->getPostWithCommentsById($request->getPostId())
        ]);
    }

    public function edit(EditPostRequest $request): View
    {
        return view('pages.posts.edit', [
            'categories' => $this->categoryRepository->getAllCategories(),
            'post' => $this->postRepository->getById($request->getPostId())
        ]);
    }

    public function update(UpdatePostRequest $request): RedirectResponse
    {
        $this->postRepository->update($request->getData());

        return redirect()->back()->with('success', 'Post updated successfully.');
    }

    public function destroy(DeletePostRequest $request): RedirectResponse
    {
        $this->postRepository->delete($request->getPostId());

        return redirect()->route('posts.manage')->with('success', 'Post deleted successfully.');
    }
}
