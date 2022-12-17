<?php

namespace Character\Infrastructure\Controller\Character;

use Character\Application\Query\Hero\GetHeroesHandler;
use Character\Application\Request\Hero\GetHeroesRequest;
use Character\Domain\Model\Hero\InvalidStatusValueException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetCharactersController
{
    private GetHeroesHandler $handler;

    public function __construct(GetHeroesHandler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $heroes = ($this->handler) (
                new GetHeroesRequest($request->get('status', 'alive'))
            );

            $response = new JsonResponse([
               'status' => 'ok',
               'hits' => [
                   $heroes->toArray()
               ]
            ]);

        } catch (InvalidStatusValueException $exception) {
            $response = new JsonResponse([
               'satatus' => 'error',
               'message' => 'Invalid Status. Must be alive, wounded or deceased'
            ], 418);
        }

        return $response;
    }
}