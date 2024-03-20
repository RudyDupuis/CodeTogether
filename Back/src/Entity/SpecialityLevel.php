<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class SpecialityLevel
{
    private ?Speciality $speciality = null;

    #[Assert\Choice(choices: ['Beginner', 'Intermediate', 'Advanced'])]
    private ?string $level = null;

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(Speciality $speciality): static
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
}
