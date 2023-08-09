<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CardRepository::class)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sideA = null;

    #[ORM\Column(length: 255)]
    private ?string $sideB = null;

    #[ORM\Column(length: 1)]
    private ?string $state = null;

    #[ORM\Column]
    private ?bool $isLearned = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSideA(): ?string
    {
        return $this->sideA;
    }

    public function setSideA(string $sideA): static
    {
        $this->sideA = $sideA;

        return $this;
    }

    public function getSideB(): ?string
    {
        return $this->sideB;
    }

    public function setSideB(string $sideB): static
    {
        $this->sideB = $sideB;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function isIsLearned(): ?bool
    {
        return $this->isLearned;
    }

    public function setIsLearned(bool $isLearned): static
    {
        $this->isLearned = $isLearned;

        return $this;
    }
}
