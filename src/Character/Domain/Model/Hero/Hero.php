<?php

namespace Character\Domain\Model\Hero;

class Hero
{
    private HeroId $id;
    private string $name;
    private string $description;
    private Status $heroStatus;

    public function __construct(HeroId $id, string $name, string $description, Status $heroStatus)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->heroStatus = $heroStatus;
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
    
    public function status(): Status
    {
        return $this->heroStatus;
    }
}