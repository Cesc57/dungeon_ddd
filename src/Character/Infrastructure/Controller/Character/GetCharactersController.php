<?php

namespace Character\Infrastructure\Controller\Character;

use Character\Domain\Model\Hero;
use Character\Domain\Model\HeroId;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetCharactersController
{
    public function __invoke(): JsonResponse
    {
        $hero = new Hero(
            new HeroId('123Cesc'),
            'Cesc',
            'Cesc mola'
        );

        return new JsonResponse([
            'status' => 'OK',
            'video' => [
                'id' => $hero->id()->value(),
                'name' => $hero->name(),
                'description' => $hero->description(),
            ],
        ]);
    }
}