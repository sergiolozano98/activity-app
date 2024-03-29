<?php

namespace App\Activities\Application\Adventure\Create;

use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;
use App\Activities\Domain\Adventure\AdventureActivityMaterial;
use App\Shared\Domain\Bus\Command\CommandHandler;

readonly class CreateAdventureActivityCommandHandler implements CommandHandler
{
    public function __construct(protected AdventureActivityCreator $creator)
    {
    }

    public function __invoke(CreateAdventureActivityCommand $command): void
    {
        $this->creator->__invoke(
            new ActivityId($command->id()),
            new ActivityName($command->name()),
            new ActivityDescription($command->description()),
            new AdventureActivityMaterial($command->material())
        );
    }
}