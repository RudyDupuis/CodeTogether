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
        $specialityLevel1->setSpeciality($this->getReference('SPECIALITY_1'));
        $specialityLevel1->setProfile($this->getReference(ProfileFixtures::PROFILE_1));
        $specialityLevel1->setLevel('Beginner');
        $manager->persist($specialityLevel1);

        $specialityLevel2 = new SpecialityLevel();
        $specialityLevel2->setSpeciality($this->getReference('SPECIALITY_4'));
        $specialityLevel2->setProfile($this->getReference(ProfileFixtures::PROFILE_1));
        $specialityLevel2->setLevel('Advanced');
        $manager->persist($specialityLevel2);

        $specialityLevel3 = new SpecialityLevel();
        $specialityLevel3->setSpeciality($this->getReference('SPECIALITY_2'));
        $specialityLevel3->setProfile($this->getReference(ProfileFixtures::PROFILE_2));
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
