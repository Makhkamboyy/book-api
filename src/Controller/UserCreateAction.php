<?php

namespace App\Controller;

use App\Components\User\UserFactory;
use App\Components\User\UserManager;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserCreateAction extends AbstractController
{
    public function __construct(private UserFactory $userFactory,private UserManager $userManager)
    {
    }

    public function __invoke($data):User
    {
        // TODO: Implement __invoke() method.
        $user = $this->userFactory->create($data->getEmail(), $data->getPassword(), $data->getAge());
        $this->userManager->save($user, true);
        return $user;



    }

}