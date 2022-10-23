<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Ord::class, mappedBy="customer")
     */
    private $ords;

    public function __construct()
    {
        $this->ords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Ord>
     */
    public function getOrds(): Collection
    {
        return $this->ords;
    }

    public function addOrd(Ord $ord): self
    {
        if (!$this->ords->contains($ord)) {
            $this->ords[] = $ord;
            $ord->setCustomer($this);
        }

        return $this;
    }

    public function removeOrd(Ord $ord): self
    {
        if ($this->ords->removeElement($ord)) {
            // set the owning side to null (unless already changed)
            if ($ord->getCustomer() === $this) {
                $ord->setCustomer(null);
            }
        }

        return $this;
    }
}
