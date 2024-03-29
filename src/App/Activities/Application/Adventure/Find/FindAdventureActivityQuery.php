<?php

namespace App\Activities\Application\Adventure\Find;

use App\Shared\Domain\Bus\Query\Query;

readonly class FindAdventureActivityQuery implements Query
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}