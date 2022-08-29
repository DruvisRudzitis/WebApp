<?php

namespace App\Controller;

use App\Repository\CartRepository;
use App\Repository\CustomerRepository;
use App\Repository\ItemRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserShowController extends AbstractController
{
    #[Route('/user/{id}', name: 'user_show', methods: ["GET"])]
    public function show
    (
        Request        $request,
        UserRepository $userRepository,
        ItemRepository $itemRepository,

    ): Response
    {
        $userId = $request->get('id');

        $user = $userRepository->findOneBy(['id' => $userId]);

        $items = $itemRepository->findAll();

        if (!$userId) {
            throw new NotFoundHttpException('user not found');
        }

        return $this->json(array('user' => $user, 'items' => $items));
    }

}
