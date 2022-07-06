<?php

namespace App\Components\User;

use Symfony\Component\Serializer\Annotation\Groups;

class MaxAgeDto
{

    public function __construct(
        #[Groups(['user:read', 'user:write'])]
        private int $maxAge
    ) {
    }

    public function getMaxAge(): int
    {
        return $this->maxAge;
    }

}