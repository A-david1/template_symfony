<?php

namespace App\Entity;

use App\Repository\ShoppingListRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShoppingListRepository::class)
 */
class ShoppingList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity=Menu::class, mappedBy="shoppinglist", cascade={"persist", "remove"})
     */
    private $menu;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        // unset the owning side of the relation if necessary
        if ($menu === null && $this->menu !== null) {
            $this->menu->setShoppinglist(null);
        }

        // set the owning side of the relation if necessary
        if ($menu !== null && $menu->getShoppinglist() !== $this) {
            $menu->setShoppinglist($this);
        }

        $this->menu = $menu;

        return $this;
    }
}
