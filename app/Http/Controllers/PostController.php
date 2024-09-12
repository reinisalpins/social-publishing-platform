<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        private readonly PostRepository $postRepository
    )
    {
    }

    public function manage(): View
    {
        return view('pages.posts.manage');
    }

    public function create(): View
    {
        return view('pages.posts.create');
    }

    public function store(SavePostRequest $request): RedirectResponse
    {
        $this->postRepository->createPost($request->getData());

        return redirect()->route('posts.manage');
    }

    public function indexByCategory(string $category_slug): View
    {
        $category = Category::where('slug', $category_slug)->firstOrFail();

        $posts = Post::whereHas('categoriesRelation', function ($query) use ($category) {
            $query->where('categories.id', $category->id);
        })
            ->with('user')
            ->latest()
            ->paginate(10);  // Adjust the number as needed

        return view('posts.index', compact('category', 'posts'));
    }
}
