<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private array $scientist_member = [];

    #[ORM\ManyToMany(targetEntity: Scientist::class, inversedBy: 'events')]
    private Collection $member_this_bd;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $theme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_event = null;

    public function __construct()
    {
        $this->member_this_bd = new ArrayCollection();
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

    public function getScientistMember(): array
    {
        return $this->scientist_member;
    }

    public function setScientistMember(?array $scientist_member): self
    {
        $this->scientist_member = $scientist_member;

        return $this;
    }

    /**
     * @return Collection<int, scientist>
     */
    public function getMemberThisBd(): Collection
    {
        return $this->member_this_bd;
    }

    public function addMemberThisBd(scientist $memberThisBd): self
    {
        if (!$this->member_this_bd->contains($memberThisBd)) {
            $this->member_this_bd->add($memberThisBd);
        }

        return $this;
    }

    public function removeMemberThisBd(scientist $memberThisBd): self
    {
        $this->member_this_bd->removeElement($memberThisBd);

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

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

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getImgEvent(): ?string
    {
        return $this->img_event;
    }

    public function setImgEvent(?string $img_event): self
    {
        $this->img_event = $img_event;

        return $this;
    }
}
