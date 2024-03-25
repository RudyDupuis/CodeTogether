<?php

namespace App\DataFixtures;

use App\Entity\Speciality;
use App\Entity\Technology;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //Users

        $user1 = new User();
        $user1->setEmail('john.doe@example.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setPassword('password');
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('jane.smith@example.com');
        $user2->setRoles(['ROLE_USER']);
        $user2->setPassword('password');
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('mike.jones@example.com');
        $user3->setRoles(['ROLE_USER']);
        $user3->setPassword('password');
        $manager->persist($user3);


        //Technologies

        $technologiesList = [
            "Javascript",
            "React",
            "Angular",
            "Java",
            "PHP",
            "Symfony",
            "SQL",
            "Python",
            "HTML",
            "CSS"
        ];

        for ( $i = 0; $i <10; $i++ ) {
            $technology = new Technology();
            $technology->setLabel( $technologiesList[$i] );
            $manager->persist( $technology );
        }


        //Specialities

        $specialitiesList = [
            "Front-end developer",
            "Back-end developer",
            "Full-stack developer",
            "Designer",
            "DevOps"
        ];

        for ( $i = 0; $i <5; $i++ ) {
            $speciality = new Speciality();
            $speciality->setLabel( $specialitiesList[$i] );
            $manager->persist( $speciality );
        }

        $manager->flush();
    }
}
