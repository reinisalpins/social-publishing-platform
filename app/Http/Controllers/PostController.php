<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
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

    public function store(CreatePostRequest $request): RedirectResponse
    {
        $this->postRepository->createPost($request->getData());

        return redirect()->route('posts.manage')->with('success', 'Post created successfully.');
    }
}
