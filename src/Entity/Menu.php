<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $startedAt;

    /**
     * @ORM\Column(type="date")
     */
    private $finishedAt;

    /**
     * @ORM\OneToMany(targetEntity=Shift::class, mappedBy="menu", orphanRemoval=true, cascade={"persist"})
     */
    private $shifts;

    /**
     * @ORM\OneToOne(targetEntity=ShoppingList::class, inversedBy="menu", cascade={"persist", "remove"})
     */
    private $shoppinglist;

    public function __construct()
    {
        $this->shifts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * @return Collection|Shift[]
     */
    public function getShifts(): Collection
    {
        return $this->shifts;
    }

    public function addShift(Shift $shift): self
    {
        if (!$this->shifts->contains($shift)) {
            $this->shifts[] = $shift;
            $shift->setMenu($this);
        }

        return $this;
    }

    public function removeShift(Shift $shift): self
    {
        if ($this->shifts->removeElement($shift)) {
            // set the owning side to null (unless already changed)
            if ($shift->getMenu() === $this) {
                $shift->setMenu(null);
            }
        }

        return $this;
    }

    public function getShoppinglist(): ?ShoppingList
    {
        return $this->shoppinglist;
    }

    public function setShoppinglist(?ShoppingList $shoppinglist): self
    {
        $this->shoppinglist = $shoppinglist;

        return $this;
    }
}
