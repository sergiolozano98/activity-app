<?php

namespace App\Activities\Application\OnlineGame;

use App\Activities\Domain\OnlineGame\OnlineGameActivity;
use App\Shared\Domain\Bus\Query\Response;

class OnlineGameActivityResponse implements Response
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $url
    )
    {
    }

    public static function createFromObject(OnlineGameActivity $activity): OnlineGameActivityResponse
    {
        return new self(
            $activity->id()->value(),
            $activity->name()->value(),
            $activity->description()->value(),
            $activity->url()->value()
        );
    }
}