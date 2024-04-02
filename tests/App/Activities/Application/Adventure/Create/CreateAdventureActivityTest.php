<?php

namespace Tests\App\Activities\Application\Adventure\Create;

use App\Activities\Application\Adventure\Create\AdventureActivityCreator;
use App\Activities\Application\Adventure\Create\CreateAdventureActivityCommand;
use App\Activities\Application\Adventure\Create\CreateAdventureActivityCommandHandler;
use App\Activities\Domain\ActivityRepository;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @group adventure
 */
class CreateAdventureActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private CreateAdventureActivityCommandHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $creator = new AdventureActivityCreator($this->repository);
        $this->handler = new CreateAdventureActivityCommandHandler($creator);
    }

    /**
     * @test
     */
    public function it_should_create()
    {
        $command = CreateAdventureActivityCommandMother::create();

        $this->repository
            ->expects($this->once())
            ->method('save');

        $this->executeHandler($command);
    }

    private function executeHandler(CreateAdventureActivityCommand $command): void
    {
        ($this->handler)($command);
    }
}