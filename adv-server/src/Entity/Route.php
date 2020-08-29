<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="route", uniqueConstraints={@ORM\UniqueConstraint(name="in", columns={"in", "out_direction"})})
 * @ORM\Entity
 */
class Route
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
     * @var int
     *
     * @ORM\Column(name="out", type="integer", nullable=false)
     */
    private $out;

    /**
     * @var int
     *
     * @ORM\Column(name="in", type="integer", nullable=false)
     */
    private $in;

    /**
     * @var int
     *
     * @ORM\Column(name="out_direction", type="integer", nullable=false)
     */
    private $outDirection;

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var int
     *
     * @ORM\Column(name="updated_user", type="integer", nullable=false)
     */
    private $updatedUser = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted", type="datetime", nullable=true)
     */
    private $deleted;

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

    public function getOut(): ?int
    {
        return $this->out;
    }

    public function setOut(int $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getIn(): ?int
    {
        return $this->in;
    }

    public function setIn(int $in): self
    {
        $this->in = $in;

        return $this;
    }

    public function getOutDirection(): ?int
    {
        return $this->outDirection;
    }

    public function setOutDirection(int $outDirection): self
    {
        $this->outDirection = $outDirection;

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

    public function setUpdated(?\DateTimeInterface $updated): self
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

    public function setDeleted(?\DateTimeInterface $deleted): self
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
