<?php

namespace Character\Domain\Model\Hero;

use Character\Domain\Collection\ObjectCollection;

class HeroCollection extends ObjectCollection
{
    public function getAllHeroes(): ?HeroCollection{
        return null;
    }

    protected function className(): string
    {
        return Hero::class;
    }
}