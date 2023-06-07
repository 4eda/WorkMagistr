<?php

namespace App\Entity;

use App\Repository\ScientistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;

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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $biography = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $institut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scentis_blog = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(length: 255 , nullable: true)]
    private ?string $Academic_degree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $academic_title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_scientist = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_brith = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_death = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_start_work = null;

    #[ORM\JoinTable(name: 'student_mentor')]
    #[JoinColumn(name: "mentor_id", referencedColumnName: "id")]
    #[InverseJoinColumn(name: "student_id", referencedColumnName: "id")]
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'student')]
    private Collection $mentor;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'mentor')]
    private Collection $student;

    #[ORM\ManyToMany(targetEntity: News::class, mappedBy: 'Scientist')]
    private Collection $news;

    #[ORM\ManyToMany(targetEntity: Category::class, mappedBy: 'Scientist')]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: Blog::class, mappedBy: 'Scientist')]
    private Collection $blogs;

    #[ORM\ManyToMany(targetEntity: InstWork::class, mappedBy: 'Scientist')]
    private Collection $instWorks;

    #[ORM\ManyToMany(targetEntity: Event::class, mappedBy: 'member_this_bd')]
    private Collection $events;


    public function __construct()
    {
        $this->mentor = new ArrayCollection();
        $this->student = new ArrayCollection();
        $this->news = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->blogs = new ArrayCollection();
        $this->instWorks = new ArrayCollection();
        $this->events = new ArrayCollection();
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


    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

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


    public function getDateBrith(): ?string
    {
        return $this->date_brith;
    }

    public function setDateBrith(?string $date_brith): self
    {
        $this->date_brith = $date_brith;

        return $this;
    }

    public function getDateDeath(): ?string
    {
        return $this->date_death;
    }

    public function setDateDeath(?string $date_death): self
    {
        $this->date_death = $date_death;

        return $this;
    }

    public function getDateStartWork(): ?string
    {
        return $this->date_start_work;
    }

    public function setDateStartWork(?string $date_start_work): self
    {
        $this->date_start_work = $date_start_work;

        return $this;
    }

    /**
     * @return Collection|Scientist[]
     */
    public function getMentor(): Collection
    {
        return $this->mentor;
    }

    public function addMentor(Scientist $mentor): self
    {
        if (!$this->mentor->contains($mentor)) {
            $this->mentor[] = $mentor;
            $mentor->addStudent($this);
        }

        return $this;
    }

    public function removeMentor(Scientist $mentor): self
    {
        if ($this->mentor->removeElement($mentor)) {
            $mentor->removeStudent($this);
        }

        return $this;
    }

    /**
     * @return Collection|Scientist[]
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Scientist $student): self
    {
        if (!$this->student->contains($student)) {
            $this->student[] = $student;
            $student->addMentor($this);
        }

        return $this;
    }

    public function removeStudent(Scientist $student): self
    {
        if ($this->student->removeElement($student)) {
            $student->removeMentor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, News>
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news->add($news);
            $news->addScientist($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->removeElement($news)) {
            $news->removeScientist($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->addScienti($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeScienti($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Blog>
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): self
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs->add($blog);
            $blog->addScientist($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): self
    {
        if ($this->blogs->removeElement($blog)) {
            $blog->removeScientist($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, InstWork>
     */
    public function getInstWorks(): Collection
    {
        return $this->instWorks;
    }

    public function addInstWork(InstWork $instWork): self
    {
        if (!$this->instWorks->contains($instWork)) {
            $this->instWorks->add($instWork);
            $instWork->addScientist($this);
        }

        return $this;
    }

    public function removeInstWork(InstWork $instWork): self
    {
        if ($this->instWorks->removeElement($instWork)) {
            $instWork->removeScientist($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->addMemberThisBd($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeMemberThisBd($this);
        }

        return $this;
    }
}
