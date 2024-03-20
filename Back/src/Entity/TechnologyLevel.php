<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class TechnologyLevel
{
    private ?Technology $technology = null;

    #[Assert\Choice(choices: ['Beginner', 'Intermediate', 'Advanced'])]
    private ?string $level = null;

    public function getTechnology(): ?Technology
    {
        return $this->technology;
    }

    public function setTechnology(Technology $technology): static
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
