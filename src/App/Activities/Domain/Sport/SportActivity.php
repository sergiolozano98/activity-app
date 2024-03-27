<?php

namespace App\Activities\Domain\Sport;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;

final class SportActivity extends Activity
{
    public function __construct(
        protected ActivityId            $id,
        protected ActivityName          $name,
        protected ActivityDescription   $description,
        protected SportActivityMaterial $material
    )
    {
        parent::__construct($id, $name, $description);
    }

    public static function create
    (
        ActivityId            $id,
        ActivityName          $name,
        ActivityDescription   $description,
        SportActivityMaterial $material
    ): SportActivity
    {
        return new self($id, $name, $description, $material);
    }

    public function material(): SportActivityMaterial
    {
        return $this->material;
    }
}