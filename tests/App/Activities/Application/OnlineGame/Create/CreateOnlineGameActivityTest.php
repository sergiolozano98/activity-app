<?php

namespace Tests\App\Activities\Application\OnlineGame\Create;

use App\Activities\Application\OnlineGame\Create\CreateOnlineGameActivityCommand;
use App\Activities\Application\OnlineGame\Create\CreateOnlineGameActivityCommandHandler;
use App\Activities\Application\OnlineGame\Create\OnlineGameActivityCreator;
use App\Activities\Domain\ActivityRepository;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

/**
 * @group onlineGame
 */
class CreateOnlineGameActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private CreateOnlineGameActivityCommandHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $creator = new OnlineGameActivityCreator($this->repository);
        $this->handler = new CreateOnlineGameActivityCommandHandler($creator);
    }

    /**
     * @test
     */
    public function it_should_create()
    {
        $command = CreateOnlineGameActivityCommandMother::create();

        $this->repository
            ->expects($this->once())
            ->method('save');

        $this->executeHandler($command);
    }

    /**
     * @test
     */
    public function it_should_throw_exception_when_url_is_not_valid()
    {
        $this->expectException(InvalidArgumentException::class);

        $command = CreateOnlineGameActivityCommandMother::withSpecificUrl('url_not_valid');

        $this->repository
            ->expects($this->never())
            ->method('save');

        $this->executeHandler($command);
    }


    private function executeHandler(CreateOnlineGameActivityCommand $command): void
    {
        ($this->handler)($command);
    }
}