<?php

namespace App\Activities\Application;

use App\Shared\Domain\Bus\Query\Response;

readonly class ActivitiesResponse implements Response
{
    private array $activities;

    public function __construct(ActivityResponse ...$activities)
    {
        $this->activities = $activities;
    }

    public function activities(): array
    {
        return $this->activities;
    }
}