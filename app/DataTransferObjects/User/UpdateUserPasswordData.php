<?php

declare(strict_types=1);

namespace App\DataTransferObjects\User;

use App\Models\User;

class UpdateUserPasswordData
{
    public function __construct(
        public readonly User   $user,
        public readonly string $password,
    )
    {
    }
}
