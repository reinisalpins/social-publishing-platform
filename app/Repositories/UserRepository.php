<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\CreateUserData;
use App\Models\User;

class UserRepository
{
    public function __construct(
        private readonly User $user
    )
    {
    }

    public function createUser(CreateUserData $data): User
    {
        $payload = [
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ];

        return $this->user->create($payload);
    }
}
