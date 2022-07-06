<?php

namespace App\Components\User;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class UserFactory
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create(string $email, string $password, int $age): User
    {
        $user = new User();
        $user->setEmail($email);
        $hashed = $this->passwordHasher->hashPassword($user, $password);
        $user->setPassword($hashed);
        $user->setAge($age);
        return $user;
    }

}