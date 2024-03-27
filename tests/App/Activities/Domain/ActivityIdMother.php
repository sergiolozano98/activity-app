<?php

namespace Tests\App\Activities\Domain;

use App\Activities\Domain\ActivityId;
use App\Shared\Domain\ValueObject\Uuid;

class ActivityIdMother
{
    public static function create(?string $value = null): ActivityId
    {
        return new ActivityId($value ?? Uuid::random()->value());
    }
}