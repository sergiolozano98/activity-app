<?php

namespace App\Activities\Application\Sport\Create;

use App\Shared\Domain\Bus\Command\Command;

readonly class CreateSportActivityCommand implements Command
{
    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private string $type,
    )
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function type(): string
    {
        return $this->type;
    }
}