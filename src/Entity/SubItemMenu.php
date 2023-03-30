<?php

namespace App\Entity;

use App\Repository\SubItemMenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubItemMenuRepository::class)]
class SubItemMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $action = null;

    #[ORM\Column(length: 255)]
    private ?string $item_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_link = null;

    #[ORM\ManyToMany(targetEntity: MenuOneItem::class, mappedBy: 'MenuSubMenu')]
    private Collection $menuitems;

    public function __construct()
    {
        $this->menuitems = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->item_name ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAction(): ?bool
    {
        return $this->action;
    }

    public function setAction(?bool $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->item_name;
    }

    public function setItemName(string $item_name): self
    {
        $this->item_name = $item_name;

        return $this;
    }

    public function getItemLink(): ?string
    {
        return $this->item_link;
    }

    public function setItemLink(?string $item_link): self
    {
        $this->item_link = $item_link;

        return $this;
    }

    /**
     * @return Collection<int, MenuOneItem>
     */
    public function getMenuitems(): Collection
    {
        return $this->menuitems;
    }

    public function addMenuitem(MenuOneItem $menuitem): self
    {
        if (!$this->menuitems->contains($menuitem)) {
            $this->menuitems->add($menuitem);
            $menuitem->addMenuSubMenu($this);
        }

        return $this;
    }

    public function removeMenuitem(MenuOneItem $menuitem): self
    {
        if ($this->menuitems->removeElement($menuitem)) {
            $menuitem->removeMenuSubMenu($this);
        }

        return $this;
    }
}
