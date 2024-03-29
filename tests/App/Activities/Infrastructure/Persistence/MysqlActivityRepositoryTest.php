<?php

namespace Tests\App\Activities\Infrastructure\Persistence;

use Tests\App\Activities\ActivityModuleInfrastructureTestCase;
use App\Activities\Domain\Activity;
use Tests\App\Activities\Domain\Adventure\AdventureActivityMother;
use Tests\App\Activities\Domain\OnlineGame\OnlineGameActivityMother;
use Tests\App\Activities\Domain\Sport\SportActivityMother;

class MysqlActivityRepositoryTest extends ActivityModuleInfrastructureTestCase
{
    /**
     * @test
     * @dataProvider activities
     */
    public function it_should_save_an_activity(Activity $activity): void
    {
        $this->mySqlRepository()->save($activity);
    }

    /**
     * @test
     * @dataProvider activities
     */
    public function it_should_search_an_existing_activity(Activity $activity): void
    {
        $this->mySqlRepository()->save($activity);

        $this->assertEquals($activity, $this->mySqlRepository()->search($activity->id()));
    }

    /**
     * @test
     * @dataProvider activities
     */
    public function it_should_delete_an_existing_activity(Activity $activity): void
    {
        $this->mySqlRepository()->save($activity);
        $this->mySqlRepository()->delete($activity);

        $this->assertNull($this->mySqlRepository()->search($activity->id()));
    }

    public static function activities(): array
    {
        return [
            'sport' => [SportActivityMother::create()],
            'online_game' => [OnlineGameActivityMother::create()],
            'adventures' => [AdventureActivityMother::create()]
        ];
    }
}