<?php

namespace App\Entity;

use App\Repository\MentorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorRepository::class)]
class Mentor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'mentor_sc', targetEntity: scientist::class)]
    private Collection $Mentor;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastmod = null;

    public function __construct()
    {
        $this->Mentor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, scientist>
     */
    public function getMentor(): Collection
    {
        return $this->Mentor;
    }

    public function addMentor(scientist $mentor): self
    {
        if (!$this->Mentor->contains($mentor)) {
            $this->Mentor->add($mentor);
            $mentor->setMentorSc($this);
        }

        return $this;
    }

    public function removeMentor(scientist $mentor): self
    {
        if ($this->Mentor->removeElement($mentor)) {
            // set the owning side to null (unless already changed)
            if ($mentor->getMentorSc() === $this) {
                $mentor->setMentorSc(null);
            }
        }

        return $this;
    }

    public function getLastmod(): ?string
    {
        return $this->lastmod;
    }

    public function setLastmod(?string $lastmod): self
    {
        $this->lastmod = $lastmod;

        return $this;
    }
}
