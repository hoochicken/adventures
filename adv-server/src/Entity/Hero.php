<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hero
 *
 * @ORM\Table(name="hero")
 * * @ORM\Entity(repositoryClass="App\Repository\HeroRepository")
 */
class Hero
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="class", type="integer", nullable=false)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="pic", type="string", length=255, nullable=false)
     */
    private $pic;

    /**
     * @var int
     *
     * @ORM\Column(name="le", type="integer", nullable=false)
     */
    private $le;

    /**
     * @var int
     *
     * @ORM\Column(name="le_current", type="integer", nullable=false)
     */
    private $leCurrent;

    /**
     * @var int
     *
     * @ORM\Column(name="ae", type="integer", nullable=false)
     */
    private $ae = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ae_current", type="integer", nullable=false)
     */
    private $aeCurrent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="inventory", type="string", length=1023, nullable=false)
     */
    private $inventory;

    /**
     * @var int
     *
     * @ORM\Column(name="weapon", type="integer", nullable=false)
     */
    private $weapon;

    /**
     * @var int
     *
     * @ORM\Column(name="at", type="integer", nullable=false)
     */
    private $at;

    /**
     * @var int
     *
     * @ORM\Column(name="pa", type="integer", nullable=false)
     */
    private $pa;

    /**
     * @var string
     *
     * @ORM\Column(name="attributes", type="string", length=1023, nullable=false, options={"default"="{}"})
     */
    private $attributes = '{}';

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false, options={"default"="1"})
     */
    private $state = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="created_user", type="integer", nullable=false)
     */
    private $createdUser = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updated = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="updated_user", type="integer", nullable=false)
     */
    private $updatedUser = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $deleted = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="deleted_user", type="integer", nullable=false)
     */
    private $deletedUser = '0';

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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getClass(): ?int
    {
        return $this->class;
    }

    public function setClass(int $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function setPic(string $pic): self
    {
        $this->pic = $pic;

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
        return $this->leCurrent;
    }

    public function setLeCurrent(int $leCurrent): self
    {
        $this->leCurrent = $leCurrent;

        return $this;
    }

    public function getAe(): ?int
    {
        return $this->ae;
    }

    public function setAe(int $ae): self
    {
        $this->ae = $ae;

        return $this;
    }

    public function getAeCurrent(): ?int
    {
        return $this->aeCurrent;
    }

    public function setAeCurrent(int $aeCurrent): self
    {
        $this->aeCurrent = $aeCurrent;

        return $this;
    }

    public function getInventory(): ?string
    {
        return $this->inventory;
    }

    public function setInventory(string $inventory): self
    {
        $this->inventory = $inventory;

        return $this;
    }

    public function getWeapon(): ?int
    {
        return $this->weapon;
    }

    public function setWeapon(int $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getAt(): ?int
    {
        return $this->at;
    }

    public function setAt(int $at): self
    {
        $this->at = $at;

        return $this;
    }

    public function getPa(): ?int
    {
        return $this->pa;
    }

    public function setPa(int $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getAttributes(): ?string
    {
        return $this->attributes;
    }

    public function setAttributes(string $attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getCreatedUser(): ?int
    {
        return $this->createdUser;
    }

    public function setCreatedUser(int $createdUser): self
    {
        $this->createdUser = $createdUser;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getUpdatedUser(): ?int
    {
        return $this->updatedUser;
    }

    public function setUpdatedUser(int $updatedUser): self
    {
        $this->updatedUser = $updatedUser;

        return $this;
    }

    public function getDeleted(): ?\DateTimeInterface
    {
        return $this->deleted;
    }

    public function setDeleted(\DateTimeInterface $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getDeletedUser(): ?int
    {
        return $this->deletedUser;
    }

    public function setDeletedUser(int $deletedUser): self
    {
        $this->deletedUser = $deletedUser;

        return $this;
    }


}
