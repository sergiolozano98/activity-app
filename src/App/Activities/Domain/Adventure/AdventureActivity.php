<?php

namespace App\Activities\Domain\Adventure;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;

class AdventureActivity extends Activity
{
    public function __construct(
        protected ActivityId                $id,
        protected ActivityName              $name,
        protected ActivityDescription       $description,
        protected AdventureActivityMaterial $material
    )
    {
        parent::__construct($id, $name, $description);
    }

    public static function create
    (
        ActivityId                $id,
        ActivityName              $name,
        ActivityDescription       $description,
        AdventureActivityMaterial $material
    ): AdventureActivity
    {
        return new self($id, $name, $description, $material);
    }

    public function material(): AdventureActivityMaterial
    {
        return $this->material;
    }
}