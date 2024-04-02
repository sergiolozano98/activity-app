<?php

namespace Tests\App\Activities\Domain\Adventure;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\Adventure\AdventureActivity;
use App\Activities\Domain\Adventure\AdventureActivityMaterial;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;

class AdventureActivityMother
{
    public static function create(
        ?ActivityId                $id = null,
        ?ActivityName              $name = null,
        ?ActivityDescription       $description = null,
        ?AdventureActivityMaterial $material = null
    ): AdventureActivity
    {
        return new AdventureActivity(
            $id ?? ActivityIdMother::create(),
            $name ?? ActivityNameMother::create(),
            $description ?? ActivityDescriptionMother::create(),
            $material ?? AdventureActivityMaterialMother::create()
        );
    }

    public static function withSpecificId(ActivityId $id): AdventureActivity
    {
        return self::create(
            $id,
            ActivityNameMother::create(),
            ActivityDescriptionMother::create(),
            AdventureActivityMaterialMother::create()
        );
    }
}