<?php

namespace App\DataFixtures;

use App\Entity\Speciality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecialityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $specialitiesList = [
            'Front-end developer',
            'Back-end developer',
            'Full-stack developer',
            'Designer',
            'DevOps',
        ];

        for ($i = 0; $i < 5; ++$i) {
            $speciality = new Speciality();
            $speciality->setLabel($specialitiesList[$i]);
            $manager->persist($speciality);
            $this->addReference('speciality'.$i, $speciality);
        }

        $manager->flush();
    }
}
