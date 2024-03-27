<?php

namespace App\Activities\Application\Sport\Find;

use App\Activities\Application\Sport\SportActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\Sport\Exception\SportActivityNotFoundException;
use App\Shared\Domain\Bus\Query\QueryHandler;

readonly class FindSportActivityQueryHandler implements QueryHandler
{
    public function __construct(private SportActivityFinder $finder)
    {
    }

    /**
     * @throws SportActivityNotFoundException
     */
    public function __invoke(FindSportActivityQuery $query): SportActivityResponse
    {

        $id = new ActivityId($query->id());

        $activity = $this->finder->__invoke($id);

        if (is_null($activity)) {
            throw new SportActivityNotFoundException();
        }

        return SportActivityResponse::createFromObject($activity);
    }
}