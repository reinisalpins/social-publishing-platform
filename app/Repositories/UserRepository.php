<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(
        private readonly User $user
    )
    {
    }

    public function createUser(array $payload): User
    {
        return $this->user->create($payload);
    }
}
