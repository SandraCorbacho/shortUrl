<?php
namespace App\Http\Controllers\api\v1;

use App\Models\User;

class UserController
{
    public function getUser(int $idUser)
    {
        $user = User::find($idUser);

        return new \app\Http\Resources\V1\UserResource($user);
    }
}
