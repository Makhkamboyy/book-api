<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserGetAdultsAction extends AbstractController
{
    public function __invoke(UserRepository $userRepository): array
    {
        // TODO: Implement __invoke() method.
        $users = $userRepository->findAll();
        $result = [];
        foreach ($users as $user) {
            if($user->getAge() >= 18) {
                $result[] = $user;
            }
        }
        return $result;
    }

}