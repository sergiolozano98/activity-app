<?php

namespace App\Activities\Domain;

abstract class Activity
{
    public function __construct(
        protected ActivityId          $id,
        protected ActivityName        $name,
        protected ActivityDescription $description
    )
    {
    }

    public function id(): ActivityId
    {
        return $this->id;
    }

    public function name(): ActivityName
    {
        return $this->name;
    }

    public function description(): ActivityDescription
    {
        return $this->description;
    }


}