<?php

namespace App\Activities\Application\Adventure\Create;

use App\Shared\Domain\Bus\Command\Command;

readonly class CreateAdventureActivityCommand implements Command
{
    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private string $material,
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

    public function material(): string
    {
        return $this->material;
    }
}