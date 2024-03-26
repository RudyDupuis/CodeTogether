<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[Groups([User::DISPLAY_USER])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups([User::CREATE_USER, User::DISPLAY_USER])]
    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkedinLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $portfolioLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $repositoryLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilPicture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $availability = null;

    #[ORM\OneToOne(inversedBy: 'profil', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userRelation = null;

    /**
     * @var Collection<int, SpecialityLevel>
     */
    #[Groups([User::CREATE_USER])]
    #[ORM\OneToMany(targetEntity: SpecialityLevel::class, mappedBy: 'profil', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $specialityList;

    /**
     * @var Collection<int, TechnologyLevel>
     */
    #[ORM\OneToMany(targetEntity: TechnologyLevel::class, mappedBy: 'profil', orphanRemoval: true, cascade: ['persist', 'remove'])]
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

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?string $profilPicture): static
    {
        $this->profilPicture = $profilPicture;

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
            $specialityList->setProfil($this);
        }

        return $this;
    }

    public function removeSpecialityList(SpecialityLevel $specialityList): static
    {
        if ($this->specialityList->removeElement($specialityList)) {
            // set the owning side to null (unless already changed)
            if ($specialityList->getProfil() === $this) {
                $specialityList->setProfil(null);
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
            $technologyList->setProfil($this);
        }

        return $this;
    }

    public function removeTechnologyList(TechnologyLevel $technologyList): static
    {
        if ($this->technologyList->removeElement($technologyList)) {
            // set the owning side to null (unless already changed)
            if ($technologyList->getProfil() === $this) {
                $technologyList->setProfil(null);
            }
        }

        return $this;
    }
}
