<?php

namespace App\Activities\Application\Sport\Find;

use App\Shared\Domain\Bus\Query\Query;

readonly class FindSportActivityQuery implements Query
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}