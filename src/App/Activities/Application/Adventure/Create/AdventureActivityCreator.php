<?php

namespace App\Activities\Application\Adventure\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Adventure\AdventureActivity;
use App\Activities\Domain\Adventure\AdventureActivityMaterial;

class AdventureActivityCreator
{
    public function __construct(protected ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id, ActivityName $name, ActivityDescription $description, AdventureActivityMaterial $material): void
    {
        $activity = AdventureActivity::create($id, $name, $description, $material);

        $this->repository->save($activity);
    }
}