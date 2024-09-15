<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CreateCommentRequest;
use App\Http\Requests\Comments\DeleteCommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function __construct(
        private readonly CommentRepository $commentRepository
    )
    {
    }

    public function store(CreateCommentRequest $request): RedirectResponse
    {
        $this->commentRepository->createComment($request->getData());

        return redirect()->back();
    }

    public function destroy(DeleteCommentRequest $request): RedirectResponse
    {
        $this->commentRepository->deleteComment($request->getCommentId());

        return redirect()->back();
    }
}
