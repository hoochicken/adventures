<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeroClass
 *
 * @ORM\Table(name="hero_class")
 * @ORM\Entity(repositoryClass="App\Repository\HeroClassRepository")
 */
class HeroClass
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
