<?php

namespace Tests\App\Activities\Application\OnlineGame\Find;

use App\Activities\Application\OnlineGame\Find\FindOnlineGameActivityQuery;
use App\Activities\Application\OnlineGame\Find\FindOnlineGameActivityQueryHandler;
use App\Activities\Application\OnlineGame\Find\OnlineGameActivityFinder;
use App\Activities\Application\OnlineGame\OnlineGameActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\OnlineGame\Exception\OnlineGameActivityNotFoundException;
use App\Shared\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Tests\App\Activities\Domain\OnlineGame\OnlineGameActivityMother;

/**
 * @group onlineGame
 */
class FindOnlineGameActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private FindOnlineGameActivityQueryHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $this->handler = new FindOnlineGameActivityQueryHandler(new OnlineGameActivityFinder($this->repository));
    }

    /**
     * @test
     */
    public function it_should_find_and_return_existing_online_game_activity()
    {
        $uuid = Uuid::random();
        $query = new FindOnlineGameActivityQuery($uuid);
        $onlineGameActivity = OnlineGameActivityMother::withSpecificId(new ActivityId($uuid));

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn($onlineGameActivity);

        $response = $this->executeHandler($query);

        $this->assertEquals(
            OnlineGameActivityResponse::createFromObject($onlineGameActivity),
            $response);
    }

    /**
     * @test
     */
    public function it_should_find_and_return_null_when_not_existing_online_game_activity()
    {
        $this->expectException(OnlineGameActivityNotFoundException::class);

        $uuid = Uuid::random();
        $query = new FindOnlineGameActivityQuery($uuid);

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn(null);

        $this->executeHandler($query);
    }

    private function executeHandler(FindOnlineGameActivityQuery $query)
    {
        return ($this->handler)($query);
    }
}