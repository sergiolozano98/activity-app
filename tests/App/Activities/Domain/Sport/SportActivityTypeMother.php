<?php

namespace Tests\App\Activities\Domain\Sport;

use App\Activities\Domain\Sport\SportActivityType;
use Tests\App\Shared\Domain\WordMother;

class SportActivityTypeMother
{
    public static function create(?string $value = null): SportActivityType
    {
        return new SportActivityType($value ?? WordMother::create());
    }
}