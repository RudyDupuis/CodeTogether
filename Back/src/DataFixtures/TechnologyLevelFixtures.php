<?php

namespace App\DataFixtures;

use App\Entity\TechnologyLevel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TechnologyLevelFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $technologyLevel1 = new TechnologyLevel();
        $technologyLevel1->setTechnology($this->getReference('technology0'));
        $technologyLevel1->setProfil($this->getReference('profile1'));
        $technologyLevel1->setLevel('Beginner');
        $manager->persist($technologyLevel1);

        $technologyLevel2 = new TechnologyLevel();
        $technologyLevel2->setTechnology($this->getReference('technology1'));
        $technologyLevel2->setProfil($this->getReference('profile1'));
        $technologyLevel2->setLevel('Intermediate');
        $manager->persist($technologyLevel2);

        $technologyLevel3 = new TechnologyLevel();
        $technologyLevel3->setTechnology($this->getReference('technology5'));
        $technologyLevel3->setProfil($this->getReference('profile1'));
        $technologyLevel3->setLevel('Advanced');
        $manager->persist($technologyLevel3);

        $technologyLevel4 = new TechnologyLevel();
        $technologyLevel4->setTechnology($this->getReference('technology3'));
        $technologyLevel4->setProfil($this->getReference('profile2'));
        $technologyLevel4->setLevel('Advanced');
        $manager->persist($technologyLevel4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProfileFixtures::class,
            TechnologyFixtures::class,
        ];
    }
}
