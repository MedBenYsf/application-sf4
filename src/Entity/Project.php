<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 * @ORM\Table("projects")
 */
class Project
{
    public const MAX_ITEM_PER_PAGE = 5;
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", precision=15, scale=2)
     */
    private $targetAmount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $expiredOn;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTargetAmount(): ?float
    {
        return $this->targetAmount;
    }

    public function setTargetAmount(float $targetAmount): self
    {
        $this->targetAmount = $targetAmount;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getExpiredOn(): ?\DateTimeInterface
    {
        return $this->expiredOn;
    }

    public function setExpiredOn(?\DateTimeInterface $expiredOn): self
    {
        $this->expiredOn = $expiredOn;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExpired()
    {
        return $this->expiredOn < new \DateTime();
    }
}
