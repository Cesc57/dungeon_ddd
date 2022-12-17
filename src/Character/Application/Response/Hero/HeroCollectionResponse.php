<?php

namespace Character\Application\Response\Hero;

use Character\Domain\Model\Hero\HeroCollection;

class HeroCollectionResponse
{
    private array $heroCollection;

    public function __construct(HeroCollection $heroCollection)
    {
        $this->heroCollection = [];
        foreach ($heroCollection->getCollection() as $hero) {
            $this->heroCollection[] = new HeroResponse($hero);
        }
    }

    public function heroCollection(): array
    {
        return $this->heroCollection;
    }

    public function toArray(): array
    {
        return array_map(function ($hero) {
            return $hero->toArray();
        }, $this->heroCollection());
    }
}