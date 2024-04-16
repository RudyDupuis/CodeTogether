<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_1 = 'user1';
    public const USER_2 = 'user2';
    public const USER_3 = 'user3';

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('john.doe@example.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setPassword('password');
        $user1->setCreationAt();
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('jane.smith@example.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword('password');
        $user2->setCreationAt();
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('mike.jones@example.com');
        $user3->setRoles(['ROLE_USER']);
        $user3->setPassword('password');
        $user3->setCreationAt();
        $manager->persist($user3);

        $manager->flush();

        $this->addReference(self::USER_1, $user1);
        $this->addReference(self::USER_2, $user2);
        $this->addReference(self::USER_3, $user3);
    }
}
