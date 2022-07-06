<?php

namespace App\Components\User;

use Symfony\Component\Serializer\Annotation\Groups;

class FullNameDto
{

    public function __construct(
        #[Groups(['user:write', 'user:read'])]
        private string $name,
        #[Groups(['user:write'])]
        private string $lastname,
        #[Groups(['user:write'])]
        private string $age
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getAge(): string
    {
        return $this->age;
    }

}