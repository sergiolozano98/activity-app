<?php

namespace App\Activities\Application\OnlineGame\Create;

use App\Shared\Domain\Bus\Command\Command;

readonly class CreateOnlineGameActivityCommand implements Command
{
    public function __construct(
        private string $id,
        private string $name,
        private string $description,
        private string $url,
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

    public function url(): string
    {
        return $this->url;
    }
}