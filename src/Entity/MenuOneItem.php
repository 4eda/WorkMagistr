<?php

namespace App\Entity;

use App\Repository\MenuItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuItemRepository::class)]
class MenuOneItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $action = null;

    #[ORM\Column(length: 255)]
    private ?string $itemName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $item_link = null;

    #[ORM\ManyToMany(targetEntity: Menu::class, mappedBy: 'SubMenu')]
    private Collection $menus;

    #[ORM\ManyToMany(targetEntity: SubItemMenu::class, inversedBy: 'menuitems', cascade: ['persist', 'remove'])]
    private Collection $MenuSubMenu;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->MenuSubMenu = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->itemName ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAction(): ?bool
    {
        return $this->action;
    }

    public function setAction(bool $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemLink(): ?string
    {
        return $this->item_link;
    }

    public function setItemLink(string $item_link): self
    {
        $this->item_link = $item_link;

        return $this;
    }

    /**
     * @return Collection<int, Menu>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->addSubMenu($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removeSubMenu($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, SubitemMenu>
     */
    public function getMenuSubMenu(): Collection
    {
        return $this->MenuSubMenu;
    }

    public function addMenuSubMenu(SubitemMenu $menuSubMenu): self
    {
        if (!$this->MenuSubMenu->contains($menuSubMenu)) {
            $this->MenuSubMenu->add($menuSubMenu);
        }

        return $this;
    }

    public function removeMenuSubMenu(SubitemMenu $menuSubMenu): self
    {
        $this->MenuSubMenu->removeElement($menuSubMenu);

        return $this;
    }
}
