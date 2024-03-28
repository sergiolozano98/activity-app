<?php

namespace App\Activities\Application\OnlineGame\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\OnlineGame\OnlineGameActivity;
use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;

class OnlineGameActivityCreator
{
    public function __construct(protected ActivityRepository $repository)
    {
    }

    public function __invoke(ActivityId $id, ActivityName $name, ActivityDescription $description, OnlineGameActivityUrl $url): void
    {
        $activity = OnlineGameActivity::create($id, $name, $description, $url);

        $this->repository->save($activity);
    }
}