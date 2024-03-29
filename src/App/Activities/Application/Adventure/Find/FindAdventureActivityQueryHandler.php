<?php

namespace App\Activities\Application\Adventure\Find;

use App\Activities\Application\Adventure\AdventureActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\Adventure\Exception\AdventureActivityNotFoundException;
use App\Shared\Domain\Bus\Query\QueryHandler;

readonly class FindAdventureActivityQueryHandler implements QueryHandler
{
    public function __construct(private AdventureActivityFinder $finder)
    {
    }

    /**
     * @throws AdventureActivityNotFoundException
     */
    public function __invoke(FindAdventureActivityQuery $query): AdventureActivityResponse
    {

        $id = new ActivityId($query->id());

        $activity = $this->finder->__invoke($id);

        if (is_null($activity)) {
            throw new AdventureActivityNotFoundException();
        }

        return AdventureActivityResponse::createFromObject($activity);
    }
}