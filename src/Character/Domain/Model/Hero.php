<?php

namespace Character\Domain\Model;

class Hero
{
    private HeroId $id;
    private string $name;
    private string $description;

    public function __construct(HeroId $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function id(): HeroId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

}