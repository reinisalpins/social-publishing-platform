<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function showLogin(): View
    {
        return view('pages.auth.login');
    }

    public function showRegister(): View
    {
        return view('pages.auth.register');
    }

    public function attemptLogin(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->getCredentials())) {
            $request->session()->regenerate();

            return redirect()->route('feed');
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->withInput([
                'email' => $request->email,
            ]);
    }

    public function attemptRegister(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userRepository->createUser($request->getUserData());

        Auth::login($user);

        return redirect()->route('feed');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
