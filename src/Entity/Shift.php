<?php

namespace App\Entity;

use App\Repository\ShiftRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShiftRepository::class)
 */
class Shift
{
    const SHIFT_IDENTIFIER = [
        'Lundi midi',
        'Lundi soir',
        'Mardi midi',
        'Mardi soir',
        'Mercredi midi',
        'Mercredi soir',
        'Jeudi midi',
        'Jeudi soir',
        'Vendredi midi',
        'Vendredi soir',
        'Samedi midi',
        'Samedi soir',
        'Dimanche midi',
        'Dimanche soir',
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifier;

    /**
     * @ORM\Column(type="integer")
     */
    private $peopleCount;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="shifts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $menu;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="shifts")
     */
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getPeopleCount(): ?int
    {
        return $this->peopleCount;
    }

    public function setPeopleCount(int $peopleCount): self
    {
        $this->peopleCount = $peopleCount;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }
}
