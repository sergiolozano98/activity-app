<?php

namespace App\Activities\Application\Find;

use App\Activities\Application\ActivitiesResponse;
use App\Shared\Domain\Bus\Query\QueryHandler;

class FindAllActivitiesQueryHandler implements QueryHandler
{

    public function __construct(protected AllActivitiesFinder $finder)
    {
    }

    public function __invoke(FindAllActivitiesQuery $query): ActivitiesResponse
    {
        return $this->finder->__invoke();
    }
}