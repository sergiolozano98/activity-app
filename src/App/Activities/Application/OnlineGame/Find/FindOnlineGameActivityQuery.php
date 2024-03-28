<?php

namespace App\Activities\Application\OnlineGame\Find;

use App\Shared\Domain\Bus\Query\Query;

readonly class FindOnlineGameActivityQuery implements Query
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}