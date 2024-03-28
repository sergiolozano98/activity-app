<?php

namespace Tests\App\Activities\Domain\Sport;

use App\Activities\Domain\Sport\SportActivityMaterial;
use Tests\App\Shared\Domain\WordMother;

class SportActivityMaterialMother
{
    public static function create(?string $value = null): SportActivityMaterial
    {
        return new SportActivityMaterial($value ?? WordMother::create());
    }
}