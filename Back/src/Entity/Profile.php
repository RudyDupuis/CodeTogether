<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_PROFILE_PSEUDO', fields: ['pseudo'])]
#[UniqueEntity(fields: ['pseudo'], message: 'This pseudo has already been taken')]
class Profile
{
    #[Groups([User::DISPLAY_USER])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups([User::CREATE_USER, User::DISPLAY_USER])]
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'You must choose a pseudo')]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedinLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $portfolioLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $repositoryLink = null;

    #[ORM\Column(length: 1000, nullable: true)]
    #[Assert\Length(
        max: 1000,
        maxMessage: 'Description cannot be longer than {{ limit } characters'
    )]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilePicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Choice(choices: ['Open to work', 'Not available'])]
    private ?string $availability = null;

    #[ORM\OneToOne(inversedBy: 'profile', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userRelation = null;

    /**
     * @var Collection<int, SpecialityLevel>
     */
    #[Groups([User::CREATE_USER])]
    #[ORM\OneToMany(targetEntity: SpecialityLevel::class, mappedBy: 'profile', orphanRemoval: true, cascade: ['persist', 'remove'])]
    #[Assert\Valid]
    private Collection $specialityList;

    /**
     * @var Collection<int, TechnologyLevel>
     */
    #[Groups([User::CREATE_USER])]
    #[ORM\OneToMany(targetEntity: TechnologyLevel::class, mappedBy: 'profile', orphanRemoval: true, cascade: ['persist', 'remove'])]
    #[Assert\Valid]
    private Collection $technologyList;

    public function __construct()
    {
        $this->specialityList = new ArrayCollection();
        $this->technologyList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getLinkedinLink(): ?string
    {
        return $this->linkedinLink;
    }

    public function setLinkedinLink(?string $linkedinLink): static
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    public function getPortfolioLink(): ?string
    {
        return $this->portfolioLink;
    }

    public function setPortfolioLink(?string $portfolioLink): static
    {
        $this->portfolioLink = $portfolioLink;

        return $this;
    }

    public function getRepositoryLink(): ?string
    {
        return $this->repositoryLink;
    }

    public function setRepositoryLink(?string $repositoryLink): static
    {
        $this->repositoryLink = $repositoryLink;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }

    public function setProfilePicture(?string $profilePicture): static
    {
        $this->profilePicture = $profilePicture;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(?string $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    public function getUserRelation(): ?User
    {
        return $this->userRelation;
    }

    public function setUserRelation(User $userRelation): static
    {
        $this->userRelation = $userRelation;

        return $this;
    }

    /**
     * @return Collection<int, SpecialityLevel>
     */
    public function getSpecialityList(): Collection
    {
        return $this->specialityList;
    }

    public function addSpecialityList(SpecialityLevel $specialityList): static
    {
        if (!$this->specialityList->contains($specialityList)) {
            $this->specialityList->add($specialityList);
            $specialityList->setProfile($this);
        }

        return $this;
    }

    public function removeSpecialityList(SpecialityLevel $specialityList): static
    {
        if ($this->specialityList->removeElement($specialityList)) {
            // set the owning side to null (unless already changed)
            if ($specialityList->getProfile() === $this) {
                $specialityList->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TechnologyLevel>
     */
    public function getTechnologyList(): Collection
    {
        return $this->technologyList;
    }

    public function addTechnologyList(TechnologyLevel $technologyList): static
    {
        if (!$this->technologyList->contains($technologyList)) {
            $this->technologyList->add($technologyList);
            $technologyList->setProfile($this);
        }

        return $this;
    }

    public function removeTechnologyList(TechnologyLevel $technologyList): static
    {
        if ($this->technologyList->removeElement($technologyList)) {
            // set the owning side to null (unless already changed)
            if ($technologyList->getProfile() === $this) {
                $technologyList->setProfile(null);
            }
        }

        return $this;
    }
}
