<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->ItemsData() as [$title, $price]) {
            $item = new Item();
            $item->setTitle($title);
            $item->setPrice($price);
            $manager->persist($item);
        }

        $manager->flush();
    }

    private function ItemsData()
    {
        return [

            ['Televizors', 200],
            ['Austinas', 25],
            ['Zales plavejs', 400],
            ['HDMI kabelis', 40],
        ];
    }
}
