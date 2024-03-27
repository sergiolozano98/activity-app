<?php

namespace App\Activities\Application;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Sport\SportActivity;
use App\Activities\Domain\Sport\SportActivityMaterial;
use App\Shared\Domain\ValueObject\Uuid;

readonly class CreateSportActivityHandler
{
    public function __construct(protected ActivityRepository $repository)
    {
    }

    public function __invoke(): void
    {
        $this->repository->save(new SportActivity(
            new ActivityId(Uuid::random()),
            new ActivityName('name_sport'),
            new ActivityDescription('desc_sport'),
            new SportActivityMaterial('sport_material')
        ));
    }
}