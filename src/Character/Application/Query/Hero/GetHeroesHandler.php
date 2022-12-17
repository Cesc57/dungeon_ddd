<?php

namespace Character\Application\Query\Hero;

use Character\Application\Request\Hero\GetHeroesRequest;
use Character\Application\Response\Hero\HeroCollectionResponse;
use Character\Domain\Model\Hero\HeroRepository;
use Character\Domain\Model\Hero\Status;

class GetHeroesHandler
{
    private HeroRepository $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function __invoke(GetHeroesRequest $getHeroesRequest): HeroCollectionResponse
    {
        $heroes = $this->heroRepository->findHeroesByStatus(
            new Status($getHeroesRequest->status())
        );

        return new HeroCollectionResponse($heroes);
    }
}