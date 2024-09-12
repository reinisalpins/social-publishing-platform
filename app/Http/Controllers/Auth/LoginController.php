<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.login');
    }

    public function attempt(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->getCredentials())) {
            $request->session()->regenerate();

            return redirect()->route('feed.index');
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
