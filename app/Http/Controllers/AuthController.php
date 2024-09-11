<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('pages.login');
    }

    public function attemptLogin(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->getCredentials())) {
            $request->session()->regenerate();

            return redirect()->intended('feed');
        }

        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
            ->withInput([
                'email' => $request->email,
            ]);
    }
}
