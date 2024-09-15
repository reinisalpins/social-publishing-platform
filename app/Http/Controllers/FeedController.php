<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Posts\GetPostsByCategorySlugRequest;
use App\Http\Requests\Posts\SearchPostsRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\View\View;

class FeedController extends Controller
{
    public function __construct(
        private readonly PostRepository     $postRepository,
        private readonly CategoryRepository $categoryRepository
    )
    {
    }

    public function index(): View
    {
        return view('pages.feed', [
            'posts' => $this->postRepository->getAllPosts()
        ]);
    }

    public function showCategoryFeed(GetPostsByCategorySlugRequest $request): View
    {
        $category = $this->categoryRepository->getBySlug($request->getSlug());

        return view('pages.feed', [
            'posts' => $this->postRepository->getByCategory($category),
            'category' => $category
        ]);
    }

    public function showSearchResults(SearchPostsRequest $request): View
    {
        return view('pages.feed', [
            'posts' => $this->postRepository->search($request->getTerm()),
            'term' => $request->getTerm()
        ]);
    }
}
