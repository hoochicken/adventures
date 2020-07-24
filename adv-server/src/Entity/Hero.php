<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeroRepository")
 */
class Hero
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $le;

    /**
     * @ORM\Column(type="integer")
     */
    private $le_current;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $title): self
    {
        $this->name = $title;
        return $this;
    }

    public function getLe(): ?int
    {
        return $this->le;
    }

    public function setLe(int $le): self
    {
        $this->le = $le;
        return $this;
    }

    public function getLeCurrent(): ?int
    {
        return $this->le_current;
    }

    public function setLeCurrent(int $le_current): self
    {
        $this->le_current = $le_current;
        return $this;
    }
}
