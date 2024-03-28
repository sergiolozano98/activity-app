<?php

namespace Tests\App\Activities\Domain\OnlineGame;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;
use App\Activities\Domain\Sport\SportActivity;
use App\Activities\Domain\Sport\SportActivityMaterial;
use App\Shared\Domain\ValueObject\Uuid;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;
use Tests\App\Activities\Domain\Sport\SportActivityMaterialMother;

class OnlineGameActivityMother
{
    public static function create(
        ?ActivityId            $id = null,
        ?ActivityName          $name = null,
        ?ActivityDescription   $description = null,
        ?OnlineGameActivityUrl $url = null
    ): SportActivity
    {
        return new SportActivity(
            $id ?? ActivityIdMother::create(),
            $name ?? ActivityNameMother::create(),
            $description ?? ActivityDescriptionMother::create(),
            $url ?? SportActivityMaterialMother::create()
        );
    }

    public static function withSpecificId(ActivityId $id): SportActivity
    {
        return self::create(
            $id,
            ActivityNameMother::create(),
            ActivityDescriptionMother::create(),
            OnlineGameUrlActivityMother::create()
        );
    }
}