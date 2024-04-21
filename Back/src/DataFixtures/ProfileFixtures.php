<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfileFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROFILE_1 = 'profil1';
    public const PROFILE_2 = 'profil2';
    public const PROFILE_3 = 'profil3';

    public function load(ObjectManager $manager): void
    {
        $profile1 = new Profil();
        $profile1->setPseudo('Visionnaire_agile');
        $profile1->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile1->setRepositoryLink('https://github.com/Jordan-Robin?tab=repositories');
        $profile1->setDescription("Ayant excellé dans le développement web pendant 7 ans, j'ai maîtrisé les langages front-end et back-end, contribuant à la création d'interfaces utilisateur fluides et à des fonctionnalités robustes.");
        $profile1->setAvailability('Open to work');
        $profile1->setUserRelation($this->getReference(UserFixtures::USER_1));
        $manager->persist($profile1);

        $profile2 = new Profil();
        $profile2->setPseudo('Pierre_Robert');
        $profile2->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile2->setDescription("Avec 5 ans d'expérience en développement full-stack, j'ai dirigé des équipes pour livrer des projets web innovants. J'ai optimisé les performances et la sécurité, garantissant des produits de haute qualité.");
        $profile2->setAvailability('Open to work');
        $profile2->setUserRelation($this->getReference(UserFixtures::USER_2));
        $manager->persist($profile2);

        $profile3 = new Profil();
        $profile3->setPseudo('MagicienDuFrontEnd');
        $profile3->setLinkedinLink('https://www.linkedin.com/in/jordan-robin-ba6b73113/');
        $profile3->setDescription("En tant que développeur web senior, j'ai géré des projets complexes pour des clients internationaux pendant plus de 8 ans. J'ai mis en œuvre des solutions évolutives et intégrées, dépassant les attentes des clients.");
        $profile3->setAvailability('Not available');
        $profile3->setUserRelation($this->getReference(UserFixtures::USER_3));
        $manager->persist($profile3);

        $manager->flush();

        $this->addReference(self::PROFILE_1, $profile1);
        $this->addReference(self::PROFILE_2, $profile2);
        $this->addReference(self::PROFILE_3, $profile3);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
