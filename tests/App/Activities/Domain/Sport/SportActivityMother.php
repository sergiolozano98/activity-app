<?php

namespace Tests\App\Activities\Domain\Sport;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\Sport\SportActivity;
use App\Activities\Domain\Sport\SportActivityType;
use App\Shared\Domain\ValueObject\Uuid;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;

class SportActivityMother
{
    public static function create(
        ?ActivityId            $id = null,
        ?ActivityName          $name = null,
        ?ActivityDescription   $description = null,
        ?SportActivityType $type = null
    ): SportActivity
    {
        return new SportActivity(
            $id ?? ActivityIdMother::create(),
            $name ?? ActivityNameMother::create(),
            $description ?? ActivityDescriptionMother::create(),
            $type ?? SportActivityTypeMother::create()
        );
    }

    public static function withSpecificId(ActivityId $id): SportActivity
    {
        return self::create(
            $id,
            ActivityNameMother::create('name'),
            ActivityDescriptionMother::create('description'),
            SportActivityTypeMother::create('type')
        );
    }
}