<?php

declare(strict_types=1);

namespace App\src\User\Domain\Service;

use App\Hexagonal\Domain\Entity\User\User;
use App\Hexagonal\Domain\Resources\User\CreateUserRequestResource;
use App\src\User\Infrastructure\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CreateUserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function create(CreateUserRequestResource $requestResource): JsonResponse
    {
        $user = (new User())
            ->setName($requestResource->name())
            ->setEmail($requestResource->email())
            ->setPassword($requestResource->password());

        $this->userRepository->save($user);

        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::login($user);
        return Response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }
}
