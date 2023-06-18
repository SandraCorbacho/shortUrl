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

    /**
     * @throws \Exception
     */
    public function execute(
        CreateUserRequestResource $requestResource
    ): JsonResponse
    {
        try {
            return $this->createUserService->create($requestResource);
        }
        catch (\Throwable $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}
