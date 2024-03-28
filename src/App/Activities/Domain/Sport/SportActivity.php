<?php

namespace App\Activities\Domain\Sport;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;

final class SportActivity extends Activity
{
    public function __construct(
        protected ActivityId          $id,
        protected ActivityName        $name,
        protected ActivityDescription $description,
        protected SportActivityType   $type
    )
    {
        parent::__construct($id, $name, $description);
    }

    public static function create
    (
        ActivityId          $id,
        ActivityName        $name,
        ActivityDescription $description,
        SportActivityType   $type
    ): SportActivity
    {
        return new self($id, $name, $description, $type);
    }

    public function type(): SportActivityType
    {
        return $this->type;
    }
}