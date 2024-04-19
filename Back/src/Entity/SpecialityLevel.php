<?php

namespace App\Entity;

use App\Repository\SpecialityLevelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SpecialityLevelRepository::class)]
class SpecialityLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups([User::CREATE_USER])]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Speciality $speciality = null;

    #[Groups([User::CREATE_USER])]
    #[ORM\Column(length: 255)]
    #[Assert\Choice(
        choices: ['Beginner', 'Intermediate', 'Advanced'],
        message: 'Level must be Beginner, Intermediate or Advanced'
    )]
    private ?string $level = null;

    #[ORM\ManyToOne(inversedBy: 'specialityList')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Profil $profil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): static
    {
        $this->profil = $profil;

        return $this;
    }
}
