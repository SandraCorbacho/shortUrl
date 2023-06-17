<?php

namespace App\Http\Controllers\api\v1;

use App\Hexagonal\Domain\Resources\CreateUserRequestResource;
use App\Http\Controllers\Controller;
use App\src\User\Application\UseCase\CreateUserUseCase;
use App\src\User\Request\CreateUserControllerRequest;
use Illuminate\Http\JsonResponse;

/** @POST(
 *      path="/users",
 *      operationId="CreateUserUseCase",
 *     summary="create new user"
 *     tags=["Users"},
 *
 * @OA/RequestBody(
 *     description="Required Data",
 *     required=true,
 *     ),
 */

class CreateUserController extends Controller
{

    public function create(
        CreateUserControllerRequest $request,
        CreateUserUseCase $createUserUseCase
    ): JsonResponse
    {
        try{
            $requestResource = new CreateUserRequestResource(
                $request->json('name'),
                $request->json('email'),
                $request->json('password')
            );
            return $createUserUseCase->execute($requestResource);

        }catch(\Throwable $e) {
            return $e->getMessage();
        }
    }
}
