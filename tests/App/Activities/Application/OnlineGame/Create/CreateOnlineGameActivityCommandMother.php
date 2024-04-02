<?php

namespace Tests\App\Activities\Application\OnlineGame\Create;

use App\Activities\Application\OnlineGame\Create\CreateOnlineGameActivityCommand;
use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;
use Tests\App\Activities\Domain\OnlineGame\OnlineGameUrlActivityMother;

class CreateOnlineGameActivityCommandMother
{
    public static function create(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?string $url = null
    ): CreateOnlineGameActivityCommand
    {
        return new CreateOnlineGameActivityCommand(
            $id ?? ActivityIdMother::create()->value(),
            $name ?? ActivityNameMother::create()->value(),
            $description ?? ActivityDescriptionMother::create()->value(),
            $url ?? OnlineGameUrlActivityMother::create()->value()
        );
    }


    public static function withSpecificUrl(string $url): CreateOnlineGameActivityCommand
    {
        return self::create(
            ActivityIdMother::create()->value(),
            ActivityNameMother::create()->value(),
            ActivityDescriptionMother::create()->value(),
            $url
        );
    }
}