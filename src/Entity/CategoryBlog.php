<?php

namespace App\Entity;

use App\Repository\CategoryBlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryBlogRepository::class)]
class CategoryBlog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Blog::class, inversedBy: 'categoryBlogs')]
    private Collection $blog_id;

    #[ORM\Column]
    private ?bool $active = null;

    public function __construct()
    {
        $this->blog_id = new ArrayCollection();
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
     * @return Collection<int, blog>
     */
    public function getBlogId(): Collection
    {
        return $this->blog_id;
    }

    public function addBlogId(blog $blogId): self
    {
        if (!$this->blog_id->contains($blogId)) {
            $this->blog_id->add($blogId);
        }

        return $this;
    }

    public function removeBlogId(blog $blogId): self
    {
        $this->blog_id->removeElement($blogId);

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
