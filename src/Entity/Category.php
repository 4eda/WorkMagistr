<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Scientist::class, inversedBy: 'categories')]
    private Collection $scientist;

    #[ORM\Column]
    private ?bool $active = null;

    public function __construct()
    {
        $this->scientist = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, scientist>
     */
    public function getScientist(): Collection
    {
        return $this->scientist;
    }

    public function addScienti(scientist $scientist): self
    {
        if (!$this->scientist->contains($scientist)) {
            $this->scientist->add($scientist);
        }

        return $this;
    }

    public function removeScienti(scientist $scientist): self
    {
        $this->scientist->removeElement($scientist);

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
