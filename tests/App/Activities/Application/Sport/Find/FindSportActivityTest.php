<?php

namespace Tests\App\Activities\Application\Sport\Find;

use App\Activities\Application\Sport\Find\FindSportActivityQuery;
use App\Activities\Application\Sport\Find\FindSportActivityQueryHandler;
use App\Activities\Application\Sport\Find\SportActivityFinder;
use App\Activities\Application\Sport\SportActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Sport\Exception\SportActivityNotFoundException;
use App\Shared\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Tests\App\Activities\Domain\Sport\SportActivityMother;

/**
 * @group sport
 */
class FindSportActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private FindSportActivityQueryHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $this->handler = new FindSportActivityQueryHandler(new SportActivityFinder($this->repository));
    }

    /**
     * @test
     */
    public function it_should_find_and_return_existing_sport_activity()
    {
        $uuid = Uuid::random();
        $query = new FindSportActivityQuery($uuid);
        $sportActivity = SportActivityMother::withSpecificId(new ActivityId($uuid));

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn($sportActivity);

        $response = $this->executeHandler($query);

        $this->assertEquals(
            SportActivityResponse::createFromObject($sportActivity),
            $response);
    }

    /**
     * @test
     */
    public function it_should_find_and_return_null_when_not_existing_sport_activity()
    {
        $this->expectException(SportActivityNotFoundException::class);

        $uuid = Uuid::random();
        $query = new FindSportActivityQuery($uuid);

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn(null);

        $this->executeHandler($query);
    }

    private function executeHandler(FindSportActivityQuery $query)
    {
        return ($this->handler)($query);
    }
}