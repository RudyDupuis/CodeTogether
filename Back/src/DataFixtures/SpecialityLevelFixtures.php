<?php

namespace App\DataFixtures;

use App\Entity\SpecialityLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpecialityLevelFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $specialityLevel1 = new SpecialityLevel();
        $specialityLevel1->setSpeciality($this->getReference('speciality1'));
        $specialityLevel1->setProfil($this->getReference('profile1'));
        $specialityLevel1->setLevel('Beginner');
        $manager->persist($specialityLevel1);

        $specialityLevel2 = new SpecialityLevel();
        $specialityLevel2->setSpeciality($this->getReference('speciality4'));
        $specialityLevel2->setProfil($this->getReference('profile1'));
        $specialityLevel2->setLevel('Advanced');
        $manager->persist($specialityLevel2);

        $specialityLevel3 = new SpecialityLevel();
        $specialityLevel3->setSpeciality($this->getReference('speciality2'));
        $specialityLevel3->setProfil($this->getReference('profile2'));
        $specialityLevel3->setLevel('Advanced');
        $manager->persist($specialityLevel3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProfileFixtures::class,
            SpecialityFixtures::class,
        ];
    }
}
