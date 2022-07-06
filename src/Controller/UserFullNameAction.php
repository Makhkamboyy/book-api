<?php

namespace App\Controller;

use App\Components\User\FullNameDto;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class UserFullNameAction extends AbstractController
{
    public function __invoke(Request $request, SerializerInterface $serializer)
    {
        // TODO: Implement __invoke() method.
        /** @var FullNameDto $data */
        return $serializer->deserialize($request->getContent(), FullNameDto::class, 'json');


    }

}