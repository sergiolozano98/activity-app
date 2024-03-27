<?php

namespace Tests\App\Shared\Domain;

class WordMother
{
    public static function create(): string
    {
        return self::generateRandomString();
    }

    private static function generateRandomString($length = 10): string
    {
        $bytes = random_bytes($length);
        return bin2hex($bytes);
    }
}