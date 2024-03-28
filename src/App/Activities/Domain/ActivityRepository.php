<?php

namespace App\Activities\Domain;

interface ActivityRepository
{
    public function save(Activity $activity): void;

    public function search(ActivityId $id): ?Activity;

    public function delete(Activity $activity): void;

    public function findAll(): array;
}