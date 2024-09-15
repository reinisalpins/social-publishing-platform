<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function index(Request $request): View
    {
        return view('pages.profile.index', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $this->userRepository->updateUser($request->getData());

        return redirect()->back()->with('updateProfileSuccess', 'Profile updated successfully.');
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->userRepository->updatePassword($request->getData());

        return redirect()->back()->with('updatePasswordSuccess', 'Password updated successfully.');
    }
}
