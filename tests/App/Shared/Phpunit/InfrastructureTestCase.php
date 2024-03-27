<?php

namespace Tests\App\Shared\Phpunit;

use Doctrine\Persistence\Mapping\MappingException;
use Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class InfrastructureTestCase extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();

        parent::setUp();
    }

    /**
     * @throws Exception
     */
    protected function service(string $id): mixed
    {
        return self::getContainer()->get($id);
    }

    /**
     * @throws MappingException
     * @throws Exception
     */
    protected function clearUnitOfWork(): void
    {
        $this->service('doctrine')->getManager()->clear();
    }
}