<?php

namespace App\Activities\Domain\OnlineGame;

use InvalidArgumentException;

readonly class OnlineGameActivityUrl
{
    public function __construct(private string $value)
    {
        $this->validateUrl($this->value);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validateUrl(string $url): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid URL: $url");
        }
    }
}