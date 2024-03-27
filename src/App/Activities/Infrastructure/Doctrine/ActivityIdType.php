<?php

namespace App\Activities\Infrastructure\Doctrine;

use App\Activities\Domain\ActivityId;
use App\Shared\Domain\Persistence\Doctrine\UuidType;

class ActivityIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ActivityId::class;
    }
}