<?php

declare(strict_types=1);

namespace App\Hexagonal\Domain\Entity\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function id(): int
    {
        return $this->getAttributeValue('id');
    }

    public function name(): string
    {
        return $this->getAttributeValue('name');
    }

    public function email(): string
    {
        return $this->getAttributeValue('email');
    }

    public function password(): string
    {
        return $this->getAttributeValue('password');
    }

    public function setName(string $name): self
    {
        return $this->setAttribute('name',  $name);
    }

    public function setEmail(string $email): self
    {
        return $this->setAttribute('email', $email);
    }

    public function setPassword(string $password): self
    {
        return $this->setAttribute('password', $password);
    }
}
