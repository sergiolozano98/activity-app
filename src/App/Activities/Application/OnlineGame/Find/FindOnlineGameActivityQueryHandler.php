<?php

namespace App\Activities\Application\OnlineGame\Find;

use App\Activities\Application\OnlineGame\OnlineGameActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\Sport\Exception\OnlineGameActivityNotFoundException;
use App\Shared\Domain\Bus\Query\QueryHandler;

readonly class FindOnlineGameActivityQueryHandler implements QueryHandler
{
    public function __construct(private OnlineGameActivityFinder $finder)
    {
    }

    public function __invoke(FindOnlineGameActivityQuery $query): OnlineGameActivityResponse
    {

        $id = new ActivityId($query->id());

        $activity = $this->finder->__invoke($id);

        if (is_null($activity)) {
            throw new OnlineGameActivityNotFoundException();
        }

        return OnlineGameActivityResponse::createFromObject($activity);
    }
}