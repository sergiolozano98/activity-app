<?php

namespace Tests\App\Activities\Application\Sport\Create;

use App\Activities\Application\Sport\Create\CreateSportActivityCommand;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;
use Tests\App\Activities\Domain\Sport\SportActivityMaterialMother;

class CreateSportActivityCommandMother
{
    public static function create(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?string $material = null
    ): CreateSportActivityCommand
    {
        return new CreateSportActivityCommand(
            $id ?? ActivityIdMother::create()->value(),
            $name ?? ActivityNameMother::create()->value(),
            $description ?? ActivityDescriptionMother::create()->value(),
            $material ?? SportActivityMaterialMother::create()->value()
        );
    }
}