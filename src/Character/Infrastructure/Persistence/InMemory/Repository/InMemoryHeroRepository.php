<?php

namespace Character\Infrastructure\Persistence\InMemory\Repository;

use Character\Domain\Model\Hero\Hero;
use Character\Domain\Model\Hero\HeroCollection;
use Character\Domain\Model\Hero\HeroId;
use Character\Domain\Model\Hero\HeroRepository;
use Character\Domain\Model\Hero\Status;

class InMemoryHeroRepository implements HeroRepository
{
    private array $heroes;

    public function __construct()
    {
        $this->heroes [] = new Hero(
            new HeroId('1'),
            'Paco',
            'Paco es un elfo',
            new Status('alive')
        );

        $this->heroes [] = new Hero(
            new HeroId('2'),
            'Julia',
            'Julia es una maga',
            new Status('deceased')
        );

        $this->heroes [] = new Hero(
            new HeroId('3'),
            'Pepi',
            'Pepi es una enana',
            new Status('wounded')
        );

        $this->heroes [] = new Hero(
            new HeroId('4'),
            'Pepe',
            'Pepe es un Hobbit',
            new Status('alive')
        );
    }

    public function findHeroesByStatus(Status $status): HeroCollection
    {
        $heroCollection = new HeroCollection();

        array_map(callback: function ($hero) use ($heroCollection, $status) {
            if ($hero->status()->equals($status)) {
                $heroCollection->add($hero);
            }
        }, array: $this->heroes);
        return $heroCollection;
    }

}