<?php

namespace App\src\User\Infrastructure\Repository;

use App\Hexagonal\Domain\Entity\User\User;

class UserRepository
{
    public function save(User $user): User
    {
        $user->save();
        return $user;
    }
}
