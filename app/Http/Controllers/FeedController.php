<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class FeedController extends Controller
{
    public function index(): View
    {
        return view('pages.feed');
    }

    public function category(): View
    {
        return view('pages.feed');
    }
}
