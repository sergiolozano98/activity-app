<?php

namespace App\Activities\Application\Adventure\Find;


use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;

readonly class AdventureActivityFinder
{
    public function __construct(private ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id): ?Activity
    {
        return $this->repository->search($id);
    }
}