<?php

namespace Tests\App\Activities\Domain;

use App\Activities\Domain\ActivityDescription;
use Tests\App\Shared\Domain\WordMother;

class ActivityDescriptionMother
{
    public
    static function create(?string $value = null): ActivityDescription
    {
        return new ActivityDescription($value ?? WordMother::create());
    }
}