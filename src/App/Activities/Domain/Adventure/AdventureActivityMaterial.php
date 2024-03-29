<?php

namespace App\Activities\Domain\Adventure;

use InvalidArgumentException;

readonly class AdventureActivityMaterial
{
    public function __construct(
        protected string $value
    )
    {
        $this->ensureIsValidJson($value);
    }

    public function ensureIsValidJson(string $value): void
    {
        if ($value === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('Invalid JSON string: ' . json_last_error_msg());
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function getDecodedData(): mixed
    {
        return json_decode($this->value, true);
    }
}