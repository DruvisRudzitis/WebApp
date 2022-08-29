<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/users', name: 'users', methods: ["GET"])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
       $users = $userRepository->findAll();

       return $this->json($users);
    }

    public function create(Request $request): Response
    {
        return $this->json('');
    }




}
