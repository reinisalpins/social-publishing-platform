<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function index(): View
    {
        return view('pages.auth.register');
    }

    public function attempt(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userRepository->createUser($request->getData());

        Auth::login($user);

        return redirect()->route('feed.index');
    }
}
