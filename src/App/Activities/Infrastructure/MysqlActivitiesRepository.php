<?php

namespace App\Activities\Infrastructure;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;


readonly class MysqlActivitiesRepository extends DoctrineRepository implements ActivityRepository
{
    public function save(Activity $activity): void
    {
        $this->persist($activity);
    }

    public function search(ActivityId $id): ?Activity
    {
        return $this->repository(Activity::class)->find($id);
    }

    public function delete(Activity $activity): void
    {
        $this->remove($activity);
    }
}