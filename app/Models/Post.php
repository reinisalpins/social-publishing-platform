<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/** @mixin Builder */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getContent(): string
    {
        return $this->getAttribute('content');
    }

    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute('created_at');
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->getAttribute('updated_at');
    }

    /** @return Collection<Category> */
    public function relatedCategories(): Collection
    {
        return $this->categories;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, CategoryPost::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /** @return Collection<Comment> */
    public function relatedComments(): Collection
    {
        return $this->comments;
    }

    public function getCommentsCount(): int
    {
        return $this->comments->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relatedUser(): User
    {
        return $this->user;
    }

    public function getUserId(): int
    {
        return $this->getAttribute('user_id');
    }
}
