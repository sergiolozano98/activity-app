<?php

namespace App\Activities\Application\Find;

use App\Activities\Application\ActivitiesResponse;
use App\Activities\Application\ActivityResponse;
use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityRepository;
use function Lambdish\Phunctional\map;

readonly class AllActivitiesFinder
{
    public function __construct(private ActivityRepository $repository)
    {
    }

    public function __invoke(): ActivitiesResponse
    {
        $activities = $this->repository->findAll();

        return new ActivitiesResponse(...map($this->toResponse(), $activities));
    }


    private function toResponse(): callable
    {
        return static fn(Activity $activity): ActivityResponse => new ActivityResponse(
            $activity->id()->value(),
            $activity->name()->value(),
            $activity->description()->value(),
        );
    }
}