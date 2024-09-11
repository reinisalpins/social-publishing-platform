<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function render(): View
    {
        return view('components.header', [
            'categories' => $this->getCategories()
        ]);
    }

    protected function getCategories(): array
    {
        return [
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Travel', 'slug' => 'travel'],
            ['name' => 'Food', 'slug' => 'food'],
        ];
    }
}
