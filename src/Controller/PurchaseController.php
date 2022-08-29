<?php

namespace App\Controller;

use App\Entity\Purchase;
use App\Repository\ItemRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PurchaseController extends AbstractController
{

    #[Route('/purchase', name: 'purchase', methods: ["POST"])]
    public function purchase(
        Request                $request,
        EntityManagerInterface $entityManager,
        UserRepository         $userRepository,
        ItemRepository         $itemRepository,
        LoggerInterface        $logger
    ): Response
    {
        $purchase = new Purchase();

        $userId = json_decode($request->getContent())->user;
        $itemId = json_decode($request->getContent())->item;

        $user = $userRepository->findOneBy(['id' => $userId]);
        $item = $itemRepository->findOneBy(['id' => $itemId]);
        $itemPrice = $item->getPrice();
        $logger->info('sfdfsfsd');

        if ($itemPrice < 50) {
            $purchase->setUser($user);
            $purchase->setItem($item);
            $entityManager->persist($purchase);
            $entityManager->flush();

            $this->mailManager->sendNewMail($subject, $to, $templateSucces);

        } else {

            $this->mailManager->sendNewMail($subject, $to, $templateFailed);
        }
    }
}




