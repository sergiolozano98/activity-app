<?php

namespace App\Activities\Application\Adventure;

use App\Activities\Domain\Adventure\AdventureActivity;
use App\Shared\Domain\Bus\Query\Response;

class AdventureActivityResponse implements Response
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $material
    )
    {
    }

    public static function createFromObject(AdventureActivity $activity): AdventureActivityResponse
    {
        return new self(
            $activity->id()->value(),
            $activity->name()->value(),
            $activity->description()->value(),
            $activity->material()->value()
        );
    }
}