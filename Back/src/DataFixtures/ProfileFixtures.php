<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $profile1 = new Profil();
        $profile1->setPseudo('profile1');
        $profile1->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile1->setDescription('Je suis le profil 1');
        $profile1->setAvailability('Open to work');
        $profile1->setUserRelation($this->getReference('user1'));
        $manager->persist($profile1);

        $profile2 = new Profil();
        $profile2->setPseudo('profile2');
        $profile2->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile2->setDescription('Je suis le profil 2');
        $profile2->setAvailability('Open to work');
        $profile2->setUserRelation($this->getReference('user2'));
        $manager->persist($profile2);

        $profile3 = new Profil();
        $profile3->setPseudo('profile3');
        $profile3->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile3->setDescription('Je suis le profil 3');
        $profile3->setAvailability('Not available');
        $profile3->setUserRelation($this->getReference('user3'));
        $manager->persist($profile3);

        $manager->flush();

        $this->addReference('profile1', $profile1);
        $this->addReference('profile2', $profile2);
        $this->addReference('profile3', $profile3);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
