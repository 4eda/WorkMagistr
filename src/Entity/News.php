<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\ManyToMany(targetEntity: Scientist::class, inversedBy: 'author')]
    private Collection $scientist;

    #[ORM\ManyToMany(targetEntity: Admin::class, inversedBy: 'news')]
    private Collection $author;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_published = null;

    #[ORM\Column]
    private ?bool $active = null;

    public function __construct()
    {
        $this->scientist = new ArrayCollection();
        $this->author = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->Name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, scientist>
     */
    public function getScientist(): Collection
    {
        return $this->scientist;
    }

    public function addScientist(scientist $scientist): self
    {
        if (!$this->scientist->contains($scientist)) {
            $this->scientist->add($scientist);
        }

        return $this;
    }

    public function removeScientist(scientist $scientist): self
    {
        $this->scientist->removeElement($scientist);

        return $this;
    }

    /**
     * @return Collection<int, Admin>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(Admin $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author->add($author);
        }

        return $this;
    }

    public function removeAuthor(Admin $author): self
    {
        $this->author->removeElement($author);

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->date_published;
    }

    public function setDatePublished(\DateTimeInterface $date_published): self
    {
        $this->date_published = $date_published;

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
