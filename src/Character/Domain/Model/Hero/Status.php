<?php

namespace Character\Domain\Model\Hero;

class Status
{
    private string $value;

    const ALLOWED_VALUES = [
        'alive',
        'wounded',
        'deceased',
    ];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ALLOWED_VALUES)){
           throw new InvalidStatusValueException();
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Status $status): bool
    {
        return $this->value() === $status->value;
    }
}