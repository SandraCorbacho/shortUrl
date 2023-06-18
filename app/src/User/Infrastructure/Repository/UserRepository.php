<?php

namespace App\src\User\Infrastructure\Repository;

use App\Hexagonal\Domain\Entity\User\User;

class UserRepository
{
    /**
     * @throws \Exception
     */
    public function save(User $user): User
    {
        $userExist = $user->findUserByEmail($user->email());
            if(!$userExist){
                $user->save();
                return $user;
            }

        throw new \Exception('Ya existe un Usuario con este correo');
    }
}
