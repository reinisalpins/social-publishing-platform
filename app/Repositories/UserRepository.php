<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObjects\User\CreateUserData;
use App\DataTransferObjects\User\UpdateUserPasswordData;
use App\DataTransferObjects\User\UpdateUserData;
use App\Models\User;

class UserRepository
{
    public function __construct(
        private readonly User $user
    )
    {
    }

    public function getById(int $id): User
    {
        return $this->user->findOrFail($id);
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

    public function updateUser(UpdateUserData $data): void
    {
        $payload = [
            'email' => $data->email,
            'name' => $data->name,
        ];

        $data->user->update($payload);
    }

    public function updatePassword(UpdateUserPasswordData $data): void
    {
        $data->user->update(['password' => $data->password]);
    }
}
