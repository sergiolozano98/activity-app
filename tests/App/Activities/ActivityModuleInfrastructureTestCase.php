<?php

namespace Tests\App\Activities;

use App\Activities\Domain\ActivityRepository;
use App\Activities\Infrastructure\MysqlActivitiesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Tests\App\Shared\Doctrine\MySqlDatabaseCleaner;
use Tests\App\Shared\Phpunit\InfrastructureTestCase;

class ActivityModuleInfrastructureTestCase extends InfrastructureTestCase
{
    protected EntityManagerInterface $entityManager;

    protected function setUp(): void
    {
        self::bootKernel(['environment' => 'test']);

        $this->entityManager = $this->service('doctrine')->getManager();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        (new MySqlDatabaseCleaner())->__invoke($this->entityManager);
    }

    protected function mySqlRepository(): ActivityRepository
    {
        return new MysqlActivitiesRepository($this->entityManager);
    }
}