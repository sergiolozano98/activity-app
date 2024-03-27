<?php

namespace App\Activities\Application\Sport\Find;


use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Sport\SportActivity;

readonly class SportActivityFinder
{
    public function __construct(private ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id): ?SportActivity
    {
        return $this->repository->search($id);
    }
}