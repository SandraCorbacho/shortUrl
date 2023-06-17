<?php

declare(strict_types=1);

namespace App\Hexagonal\Domain\Resources\User;

class CreateUserRequestResource
{

    /*
     *  Name user
     *
     * @var string
     *
     * @OA\Property(
     * example= "test"
     */

    private string $name;

    /*
     *  email user
     *
     * @var string
     *
     * @OA\Property(
     * example= "test@test.com"
     */

    private string $email;

    /*
     *  password user
     *
     * @var string
     *
     * @OA\Property(
     * example= "pass"
     */

    private string $password;

    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
    public function password(): string
    {
        return $this->password;
    }

}
