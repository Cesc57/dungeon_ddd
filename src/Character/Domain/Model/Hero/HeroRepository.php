<?php

namespace Character\Domain\Model\Hero;

interface HeroRepository
{
    public function findHeroesByStatus(Status $status): HeroCollection;
}