<?php

declare(strict_types=1);

namespace app\src\User\Application\UseCase;


use App\Hexagonal\Domain\Resources\User\CreateUserRequestResource;
use App\src\User\Domain\Service\CreateUserService;
use Illuminate\Http\JsonResponse;

class CreateUserUseCase
{
    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function execute(
        CreateUserRequestResource $requestResource
    ): JsonResponse
    {
        try {
            $userResponse = $this->createUserService->create($requestResource);

            return $userResponse;
        }
        catch (\Throwable $e)
        {
            dd($e->getMessage());
            return $e->getMessage();
        }
    }
}
