<?php

namespace App\Activities\Application\OnlineGame\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;
use App\Shared\Domain\Bus\Command\CommandHandler;

readonly class CreateOnlineGameActivityCommandHandler implements CommandHandler
{
    public function __construct(protected OnlineGameActivityCreator $creator)
    {
    }

    public function __invoke(CreateOnlineGameActivityCommand $command): void
    {
        $this->creator->__invoke(
            new ActivityId($command->id()),
            new ActivityName($command->name()),
            new ActivityDescription($command->description()),
            new OnlineGameActivityUrl($command->url())
        );
    }
}