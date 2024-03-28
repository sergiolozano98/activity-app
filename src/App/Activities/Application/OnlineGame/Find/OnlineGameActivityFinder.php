<?php

namespace App\Activities\Application\OnlineGame\Find;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;

readonly class OnlineGameActivityFinder
{
    public function __construct(private ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id): ?Activity
    {
        return $this->repository->search($id);
    }
}