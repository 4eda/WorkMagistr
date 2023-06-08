<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Scientist::class, inversedBy: 'blogs')]
    private Collection $scientist;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\ManyToMany(targetEntity: CategoryBlog::class, mappedBy: 'blog_id')]
    private Collection $categoryBlogs;

    public function __construct()
    {
        $this->scientist = new ArrayCollection();
        $this->categoryBlogs = new ArrayCollection();
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    /**
     * @return Collection<int, CategoryBlog>
     */
    public function getCategoryBlogs(): Collection
    {
        return $this->categoryBlogs;
    }

    public function addCategoryBlog(CategoryBlog $categoryBlog): self
    {
        if (!$this->categoryBlogs->contains($categoryBlog)) {
            $this->categoryBlogs->add($categoryBlog);
            $categoryBlog->addBlogId($this);
        }

        return $this;
    }

    public function removeCategoryBlog(CategoryBlog $categoryBlog): self
    {
        if ($this->categoryBlogs->removeElement($categoryBlog)) {
            $categoryBlog->removeBlogId($this);
        }

        return $this;
    }
}
