<?php

namespace App\Entity;

use App\Repository\TechnologyLevelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TechnologyLevelRepository::class)]
class TechnologyLevel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $technology = null;

    #[ORM\Column(length: 15)]
    #[Assert\Choice(choices: ['Beginner', 'Intermediate', 'Advanced'])]
    private ?string $level = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechnology(): ?string
    {
        return $this->technology;
    }

    public function setTechnology(string $technology): static
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
}
