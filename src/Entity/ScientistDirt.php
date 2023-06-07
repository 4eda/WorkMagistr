<?php

namespace App\Entity;

use App\Repository\ScientistDirtRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScientistDirtRepository::class)]
class ScientistDirt
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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biography = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $institut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scentis_blog = null;

    #[ORM\Column]
    private ?bool $status = false;

    #[ORM\Column(length: 255 , nullable: true)]
    private ?string $Academic_degree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $academic_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_scientist = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_brith = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_death = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_start_work = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function __toString(): string
    {
        return $this->Name . ' ' . $this->surname;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string|null $Name
     */
    public function setName(?string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     */
    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return string|null
     */
    public function getSurnameTwo(): ?string
    {
        return $this->surname_two;
    }

    /**
     * @param string|null $surname_two
     */
    public function setSurnameTwo(?string $surname_two): void
    {
        $this->surname_two = $surname_two;
    }

    /**
     * @return string|null
     */
    public function getBiography(): ?string
    {
        return $this->biography;
    }

    /**
     * @param string|null $biography
     */
    public function setBiography(?string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * @return string|null
     */
    public function getInstitut(): ?string
    {
        return $this->institut;
    }

    /**
     * @param string|null $institut
     */
    public function setInstitut(?string $institut): void
    {
        $this->institut = $institut;
    }

    /**
     * @return string|null
     */
    public function getScentisBlog(): ?string
    {
        return $this->scentis_blog;
    }

    /**
     * @param string|null $scentis_blog
     */
    public function setScentisBlog(?string $scentis_blog): void
    {
        $this->scentis_blog = $scentis_blog;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     */
    public function setStatus(?bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getAcademicDegree(): ?string
    {
        return $this->Academic_degree;
    }

    /**
     * @param string|null $Academic_degree
     */
    public function setAcademicDegree(?string $Academic_degree): void
    {
        $this->Academic_degree = $Academic_degree;
    }

    /**
     * @return string|null
     */
    public function getAcademicTitle(): ?string
    {
        return $this->academic_title;
    }

    /**
     * @param string|null $academic_title
     */
    public function setAcademicTitle(?string $academic_title): void
    {
        $this->academic_title = $academic_title;
    }

    /**
     * @return string|null
     */
    public function getImageScientist(): ?string
    {
        return $this->image_scientist;
    }

    /**
     * @param string|null $image_scientist
     */
    public function setImageScientist(?string $image_scientist): void
    {
        $this->image_scientist = $image_scientist;
    }

    /**
     * @return string|null
     */
    public function getDateBrith(): ?string
    {
        return $this->date_brith;
    }

    /**
     * @param string|null $date_brith
     */
    public function setDateBrith(?string $date_brith): void
    {
        $this->date_brith = $date_brith;
    }

    /**
     * @return string|null
     */
    public function getDateDeath(): ?string
    {
        return $this->date_death;
    }

    /**
     * @param string|null $date_death
     */
    public function setDateDeath(?string $date_death): void
    {
        $this->date_death = $date_death;
    }

    /**
     * @return string|null
     */
    public function getDateStartWork(): ?string
    {
        return $this->date_start_work;
    }

    /**
     * @param string|null $date_start_work
     */
    public function setDateStartWork(?string $date_start_work): void
    {
        $this->date_start_work = $date_start_work;
    }

}
