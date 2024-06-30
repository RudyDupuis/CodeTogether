<?php

namespace App\Entity;

use App\Repository\TechnologyLevelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TechnologyLevelRepository::class)]
class TechnologyLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups([User::CREATE_USER, User::DISPLAY_ANOTHER_USER])]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Technology $technology = null;

    #[Groups([User::CREATE_USER, User::DISPLAY_ANOTHER_USER])]
    #[ORM\Column(length: 255)]
    #[Assert\Choice(
        choices: ['Beginner', 'Intermediate', 'Advanced'],
        message: 'Level must be Beginner, Intermediate or Advanced'
    )]
    private ?string $level = null;

    #[ORM\ManyToOne(inversedBy: 'technologyList')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Profile $profile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnology(): ?Technology
    {
        return $this->technology;
    }

    public function setTechnology(?Technology $technology): static
    {
        $this->technology = $technology;

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

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): static
    {
        $this->profile = $profile;

        return $this;
    }
}
