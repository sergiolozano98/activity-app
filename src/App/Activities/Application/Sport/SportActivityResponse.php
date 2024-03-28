<?php

namespace App\Activities\Application\Sport;

use App\Activities\Domain\Sport\SportActivity;
use App\Shared\Domain\Bus\Query\Response;

class SportActivityResponse implements Response
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $type
    )
    {
    }

    public static function createFromObject(SportActivity $activity): SportActivityResponse
    {
        return new self(
            $activity->id()->value(),
            $activity->name()->value(),
            $activity->description()->value(),
            $activity->type()->value()
        );
    }
}