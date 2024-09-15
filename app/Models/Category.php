<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @mixin Builder */
class Category extends Model
{
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getSlug(): string
    {
        return $this->getAttribute('slug');
    }
}
