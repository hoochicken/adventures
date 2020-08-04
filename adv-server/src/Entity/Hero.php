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
     * @ORM\Column(type="integer", length=10)
     */
    private $class;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pic;

    /**
     * @ORM\Column(type="integer")
     */
    private $le;

    /**
     * @ORM\Column(type="integer")
     */
    private $le_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $ae;

    /**
     * @ORM\Column(type="integer")
     */
    private $ae_current;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $inventory;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $weapon;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $at;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $pa;

    /**
     * @ORM\Column(type="string", length=1023)
     */
    private $attributes;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $state;

    public function getId(): int
    {
        return $this->id ?? 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    public function getClass(): string
    {
        return $this->name;
    }

    public function setClass(string $value): self
    {
        $this->class = $value;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $value): self
    {
        $this->description = $value;
        return $this;
    }

    public function getPic(): string
    {
        return $this->pic;
    }

    public function setPic(string $value): self
    {
        $this->pic = $value;
        return $this;
    }

    public function getLe(): int
    {
        return $this->le;
    }

    public function setLe(int $value): self
    {
        $this->le = $value;
        return $this;
    }

    public function getLeCurrent(): int
    {
        return $this->le_current;
    }

    public function setLeCurrent(int $value): self
    {
        $this->le_current = $value;
        return $this;
    }

    public function getAe(): int
    {
        return $this->ae;
    }

    public function setAe(int $value): self
    {
        $this->ae = $value;
        return $this;
    }

    public function getAeCurrent(): int
    {
        return $this->ae_current;
    }

    public function setAeCurrent(int $value): self
    {
        $this->ae_current = $value;
        return $this;
    }

    public function getInventory(): string
    {
        return $this->inventory;
    }

    public function setInventory(string $value): self
    {
        $this->inventory = $value;
        return $this;
    }

    public function getWeapon(): int
    {
        return $this->weapon;
    }

    public function setWeapon(int $value): self
    {
        $this->weapon = $value;
        return $this;
    }

    public function getAt(): int
    {
        return $this->at;
    }

    public function setAt(int $value): self
    {
        $this->at = $value;
        return $this;
    }

    public function getPa(): int
    {
        return $this->pa;
    }

    public function setPa(int $value): self
    {
        $this->pa = $value;
        return $this;
    }

    public function getAttributes(): string
    {
        return $this->attributes;
    }

    public function setAttributes(string $value): self
    {
        $this->attributes = $value;
        return $this;
    }

    public function getState(): int
    {
        return $this->state;
    }

    public function setState(int $value): self
    {
        $this->state = $value;
        return $this;
    }
}
