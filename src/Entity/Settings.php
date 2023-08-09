<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Settings
{
    protected bool $cardOrder;
    protected Collection $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
    }

    public function getCardOrder(): string
    {
        return $this->cardOrder;
    }

    public function setCardOrder(string $cardOrder): void
    {
        $this->cardOrder = $cardOrder;
    }

    public function getCards(): Collection
    {
        return $this->cards;
    }
}
