<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    public function render(): View
    {
        return view('components.header', [
            'categories' => $this->getCategories()
        ]);
    }

    /** @return Collection<Category> */
    protected function getCategories(): Collection
    {
        return $this->categoryRepository->getAllCategories();
    }
}
