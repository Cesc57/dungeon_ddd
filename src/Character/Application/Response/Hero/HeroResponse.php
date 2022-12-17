<?php

namespace Character\Application\Response\Hero;

use Character\Domain\Model\Hero\Hero;

class HeroResponse
{
    private string $id;
    private string $name;
    private string $description;
    private string $status;

    public function __construct(Hero $hero)
    {
        $this->id = $hero->id()->value();
        $this->name = $hero->name();
        $this->description = $hero->description();
        $this->status = $hero->status()->value();
    }

    public function id(): string
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

    public function status(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'description' =>$this->description(),
            'status' => $this->status(),
        ];
    }
}