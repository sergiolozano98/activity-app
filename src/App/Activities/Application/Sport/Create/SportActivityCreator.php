<?php

namespace App\Activities\Application\Sport\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Sport\SportActivity;
use App\Activities\Domain\Sport\SportActivityType;

class SportActivityCreator
{
    public function __construct(protected ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id, ActivityName $name, ActivityDescription $description, SportActivityType $type): void
    {
        $activity = SportActivity::create($id, $name, $description, $type);

        $this->repository->save($activity);
    }
}