<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Nanny::class, mappedBy="category")
     */
    public $nannies;

    public function __construct()
    {
        $this->nannies = new ArrayCollection();
    }

    public function __toString()
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
     * @return Collection|Nanny[]
     */
    public function getNannies(): Collection
    {
        return $this->nannies;
    }

    public function addNanny(Nanny $nanny): self
    {
        if (!$this->nannies->contains($nanny)) {
            $this->nannies[] = $nanny;
            $nanny->setCategory($this);
        }

        return $this;
    }

    public function removeNanny(Nanny $nanny): self
    {
        if ($this->nannies->removeElement($nanny)) {
            // set the owning side to null (unless already changed)
            if ($nanny->getCategory() === $this) {
                $nanny->setCategory(null);
            }
        }

        return $this;
    }
}
