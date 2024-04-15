<?php

namespace App\DataFixtures;

use App\Entity\Technology;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnologyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $technologiesList = [
            'Javascript',
            'React',
            'Angular',
            'Java',
            'PHP',
            'Symfony',
            'SQL',
            'Python',
            'HTML',
            'CSS',
        ];

        for ($i = 0; $i < 10; ++$i) {
            $technology = new Technology();
            $technology->setLabel($technologiesList[$i]);
            $manager->persist($technology);
            $this->addReference('technology'.$i, $technology);
        }

        $manager->flush();
    }
}
