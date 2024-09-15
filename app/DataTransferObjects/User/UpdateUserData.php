<?php

declare(strict_types=1);

namespace App\DataTransferObjects\User;

use App\Models\User;

class UpdateUserData
{
    public function __construct(
        public readonly User   $user,
        public readonly string $name,
        public readonly string $email,
    )
    {
    }
}
