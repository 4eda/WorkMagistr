<?php

namespace App\Entity;

use App\Repository\ScientistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScientistRepository::class)]
class Scientist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surname_two = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_brith = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_death = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biography = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_start_work = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $institut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scentis_blog = null;


    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255)]
    private ?string $Academic_degree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $academic_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_scientist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\ManyToOne(cascade: ['persist'], inversedBy: 'Mentor')]
    private ?Mentor $mentor_sc = null;

    public function __construct()
    {
    }

    public function __toString(): string
    {
        return $this->Name . ' ' . $this->surname;
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSurnameTwo(): ?string
    {
        return $this->surname_two;
    }

    public function setSurnameTwo(?string $surname_two): self
    {
        $this->surname_two = $surname_two;

        return $this;
    }

    public function getDateBrith(): ?\DateTimeInterface
    {
        return $this->date_brith;
    }

    public function setDateBrith(?\DateTimeInterface $date_brith): self
    {
        $this->date_brith = $date_brith;

        return $this;
    }

    public function getDateDeath(): ?\DateTimeInterface
    {
        return $this->date_death;
    }

    public function setDateDeath(?\DateTimeInterface $date_death): self
    {
        $this->date_death = $date_death;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getDateStartWork(): ?\DateTimeInterface
    {
        return $this->date_start_work;
    }

    public function setDateStartWork(?\DateTimeInterface $date_start_work): self
    {
        $this->date_start_work = $date_start_work;

        return $this;
    }

    public function getInstitut(): ?string
    {
        return $this->institut;
    }

    public function setInstitut(?string $institut): self
    {
        $this->institut = $institut;

        return $this;
    }

    public function getScentisBlog(): ?string
    {
        return $this->scentis_blog;
    }

    public function setScentisBlog(?string $scentis_blog): self
    {
        $this->scentis_blog = $scentis_blog;

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

    public function getAcademicDegree(): ?string
    {
        return $this->Academic_degree;
    }

    public function setAcademicDegree(string $Academic_degree): self
    {
        $this->Academic_degree = $Academic_degree;

        return $this;
    }

    public function getAcademicTitle(): ?string
    {
        return $this->academic_title;
    }

    public function setAcademicTitle(?string $academic_title): self
    {
        $this->academic_title = $academic_title;

        return $this;
    }

    public function getImageScientist(): ?string
    {
        return $this->image_scientist;
    }

    public function setImageScientist(?string $image_scientist): self
    {
        $this->image_scientist = $image_scientist;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMentorSc(): ?Mentor
    {
        return $this->mentor_sc;
    }

    public function setMentorSc(?Mentor $mentor_sc): self
    {

        $this->mentor_sc = $mentor_sc;

        return $this;
    }
}
