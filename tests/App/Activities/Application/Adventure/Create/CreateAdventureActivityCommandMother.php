<?php

namespace Tests\App\Activities\Application\Adventure\Create;

use App\Activities\Application\Adventure\Create\CreateAdventureActivityCommand;
use Tests\App\Activities\Domain\ActivityDescriptionMother;
use Tests\App\Activities\Domain\ActivityIdMother;
use Tests\App\Activities\Domain\ActivityNameMother;
use Tests\App\Activities\Domain\Adventure\AdventureActivityMaterialMother;

class CreateAdventureActivityCommandMother
{
    public static function create(
        ?string $id = null,
        ?string $name = null,
        ?string $description = null,
        ?string $type = null
    ): CreateAdventureActivityCommand
    {
        return new CreateAdventureActivityCommand(
            $id ?? ActivityIdMother::create()->value(),
            $name ?? ActivityNameMother::create()->value(),
            $description ?? ActivityDescriptionMother::create()->value(),
            $material ?? AdventureActivityMaterialMother::create()->value()
        );
    }
}