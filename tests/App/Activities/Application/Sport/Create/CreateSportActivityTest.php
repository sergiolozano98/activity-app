<?php

namespace Tests\App\Activities\Application\Sport\Create;

use App\Activities\Application\Sport\Create\CreateSportActivityCommand;
use App\Activities\Application\Sport\Create\CreateSportActivityCommandHandler;
use App\Activities\Application\Sport\Create\SportActivityCreator;
use App\Activities\Domain\ActivityRepository;
use PHPUnit\Framework\TestCase;

/**
 * @group sport
 */
class CreateSportActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private CreateSportActivityCommandHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $creator = new SportActivityCreator($this->repository);
        $this->handler = new CreateSportActivityCommandHandler($creator);
    }

    /**
     * @test
     */
    public function it_should_create_and_send_notify()
    {
        $command = CreateSportActivityCommandMother::create();

        $this->repository
            ->expects($this->once())
            ->method('save');

        $this->executeHandler($command);
    }

    private function executeHandler(CreateSportActivityCommand $command): void
    {
        ($this->handler)($command);
    }
}