<?php

namespace Tests\App\Activities\Application\Adventure\Find;

use App\Activities\Application\Adventure\Find\FindAdventureActivityQuery;
use App\Activities\Application\Adventure\Find\FindAdventureActivityQueryHandler;
use App\Activities\Application\Adventure\Find\AdventureActivityFinder;
use App\Activities\Application\Adventure\AdventureActivityResponse;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityRepository;
use App\Activities\Domain\Adventure\Exception\AdventureActivityNotFoundException;
use App\Shared\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;
use Tests\App\Activities\Domain\Adventure\AdventureActivityMother;

/**
 * @group adventure
 */
class FindAdventureActivityTest extends TestCase
{
    private ActivityRepository|null $repository = null;
    private FindAdventureActivityQueryHandler $handler;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ActivityRepository::class);

        $this->handler = new FindAdventureActivityQueryHandler(new AdventureActivityFinder($this->repository));
    }

    /**
     * @test
     */
    public function it_should_find_and_return_existing_adventure_activity()
    {
        $uuid = Uuid::random();
        $query = new FindAdventureActivityQuery($uuid);
        $adventureActivity = AdventureActivityMother::withSpecificId(new ActivityId($uuid));

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn($adventureActivity);

        $response = $this->executeHandler($query);

        $this->assertEquals(
            AdventureActivityResponse::createFromObject($adventureActivity),
            $response);
    }

    /**
     * @test
     */
    public function it_should_find_and_return_null_when_not_existing_adventure_activity()
    {
        $this->expectException(AdventureActivityNotFoundException::class);

        $uuid = Uuid::random();
        $query = new FindAdventureActivityQuery($uuid);

        $this->repository
            ->expects($this->once())
            ->method('search')
            ->willReturn(null);

        $this->executeHandler($query);
    }

    private function executeHandler(FindAdventureActivityQuery $query)
    {
        return ($this->handler)($query);
    }
}