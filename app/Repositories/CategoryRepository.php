<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    public function __construct(
        private readonly Category $category
    )
    {
    }

    /** @return Collection<Category> */
    public function getAllCategories(): Collection
    {
        return $this->category->get();
    }

    public function getBySlug(string $slug): Category
    {
        return $this->category->where('slug', '=', $slug)->firstOrFail();
    }
}
