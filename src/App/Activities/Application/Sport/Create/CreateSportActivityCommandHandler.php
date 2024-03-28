<?php

namespace App\Activities\Application\Sport\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\Sport\SportActivityType;
use App\Shared\Domain\Bus\Command\CommandHandler;

readonly class CreateSportActivityCommandHandler implements CommandHandler
{
    public function __construct(protected SportActivityCreator $creator)
    {
    }

    public function __invoke(CreateSportActivityCommand $command): void
    {
        $this->creator->__invoke(
            new ActivityId($command->id()),
            new ActivityName($command->name()),
            new ActivityDescription($command->description()),
            new SportActivityType($command->type())
        );
    }
}