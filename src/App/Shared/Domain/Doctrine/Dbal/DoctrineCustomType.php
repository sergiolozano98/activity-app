<?php
declare(strict_types=1);

namespace App\Shared\Domain\Doctrine\Dbal;

interface DoctrineCustomType
{
    public static function customTypeName(): string;
}