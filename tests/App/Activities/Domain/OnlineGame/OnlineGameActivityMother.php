<?php

namespace Tests\App\Activities\Domain\OnlineGame;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\OnlineGame\OnlineGameActivity;
use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;

class OnlineGameActivityMother
{
    public static function create(
        ?ActivityId            $id = null,
        ?ActivityName          $name = null,
        ?ActivityDescription   $description = null,
        ?OnlineGameActivityUrl $url = null
    ): OnlineGameActivity
    {
        return new OnlineGameActivity(
            $id ?? ActivityIdMother::create(),
            $name ?? ActivityNameMother::create(),
            $description ?? ActivityDescriptionMother::create(),
            $url ?? OnlineGameUrlActivityMother::create()
        );
    }

    public static function withSpecificId(ActivityId $id): OnlineGameActivity
    {
        return self::create(
            $id,
            ActivityNameMother::create(),
            ActivityDescriptionMother::create(),
            OnlineGameUrlActivityMother::create()
        );
    }
}