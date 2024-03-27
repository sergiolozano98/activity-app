<?php

namespace App\Shared\Domain\ValueObject;

class StringValueObject
{
    public function __construct(protected string $value) {}

    final public function value(): string
    {
        return $this->value;
    }
}