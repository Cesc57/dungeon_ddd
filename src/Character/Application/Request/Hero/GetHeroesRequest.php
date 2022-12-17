<?php

namespace Character\Application\Request\Hero;

class GetHeroesRequest
{
//dto => Le pasará los datos al handler
    private string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }
}