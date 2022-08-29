<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use App\Repository\ItemRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{

    #[Route('/items', name: 'items')]
    public function index(Request $request, ItemRepository $itemRepository): Response
    {
       $items = $itemRepository->findAll();

       return $this->json($items);
    }

    public function create(Request $request): Response
    {
        return $this->json('');
    }




}
