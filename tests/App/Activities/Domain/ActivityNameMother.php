<?php

namespace Tests\App\Activities\Domain;

use App\Activities\Domain\ActivityName;
use Tests\App\Shared\Domain\WordMother;

class ActivityNameMother
{
    public static function create(?string $value = null): ActivityName
    {
        return new ActivityName($value ?? WordMother::create());
    }
}