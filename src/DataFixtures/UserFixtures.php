<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->UsersData() as [$name, $email]) {
            $user = new User();
            $user->setName($name);
            $user->setEmail($email);
            $manager->persist($user);
        }

        $manager->flush();
    }

    private function UsersData()
    {
        return [

            ['Janis', 'janis@gmail.com'],
            ['Peteris', 'peteris@gmail.com'],
            ['Maris', 'maris@gmail.com'],
            ['Ivo', 'ivo@gmail.com']
        ];
    }
}
