<?php

namespace App\Activities\Application\Sport\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Sport\SportActivity;
use App\Activities\Domain\Sport\SportActivityMaterial;

class SportActivityCreator
{
    public function __construct(protected ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id, ActivityName $name, ActivityDescription $description, SportActivityMaterial $material): void
    {
        $activity = SportActivity::create($id, $name, $description, $material);

        $this->repository->save($activity);
    }
}