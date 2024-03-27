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
}