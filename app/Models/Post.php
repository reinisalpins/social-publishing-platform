<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/** @mixin Builder */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function categoriesRelation(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, CategoryPost::class);
    }
}
