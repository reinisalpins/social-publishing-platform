<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/** @mixin Builder */
class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'content',
    ];

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getContent(): string
    {
        return $this->getAttribute('content');
    }

    public function getUserId(): int
    {
        return $this->getAttribute('user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relatedUser(): User
    {
        return $this->user;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute('created_at');
    }
}
