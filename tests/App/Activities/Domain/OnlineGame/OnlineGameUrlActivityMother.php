<?php

namespace Tests\App\Activities\Domain\OnlineGame;

use App\Activities\Domain\OnlineGame\OnlineGameActivityUrl;
use Tests\App\Shared\Domain\WordMother;

class OnlineGameUrlActivityMother
{
    public static function create(?string $value = null): OnlineGameActivityUrl
    {
        return new OnlineGameActivityUrl($value ?? 'https://example.com/'.WordMother::create());
    }
}