<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('john.doe@example.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setPassword('password');
        $user1->setCreationDate();
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('jane.smith@example.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword('password');
        $user2->setCreationDate();
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('mike.jones@example.com');
        $user3->setRoles(['ROLE_USER']);
        $user3->setPassword('password');
        $user3->setCreationDate();
        $manager->persist($user3);

        $manager->flush();
    }
}
