<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $active = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: MenuOneItem::class, inversedBy: 'menus', cascade: ['persist', 'remove'])]
    private Collection $SubMenu;

    public function __construct()
    {
        $this->SubMenu = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, MenuOneItem>
     */
    public function getSubMenu(): Collection
    {
        return $this->SubMenu;
    }

    public function addSubMenu(MenuOneItem $subMenu): self
    {
        if (!$this->SubMenu->contains($subMenu)) {
            $this->SubMenu->add($subMenu);
        }

        return $this;
    }

    public function removeSubMenu(MenuOneItem $subMenu): self
    {
        $this->SubMenu->removeElement($subMenu);

        return $this;
    }
}
