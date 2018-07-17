<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MorpionRepository")
 */
class Morpion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $grid;

    public function __construct(array $grid)
    {
        $this->setGrid($grid);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGrid(): ?array
    {
        return $this->grid;
    }

    public function setGrid(?array $grid): self
    {
        $this->grid = $grid;

        return $this;
    }
}
