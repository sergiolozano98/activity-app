<?php

namespace App\Activities\Domain\OnlineGame;

use App\Activities\Domain\Activity;
use App\Activities\Domain\ActivityDescription;
use App\Activities\Domain\ActivityId;
use App\Activities\Domain\ActivityName;

class OnlineGameActivity extends Activity
{
    public function __construct(
        protected ActivityId            $id,
        protected ActivityName          $name,
        protected ActivityDescription   $description,
        protected OnlineGameActivityUrl $url
    )
    {
        parent::__construct($id, $name, $description);
    }

    public static function create
    (
        ActivityId            $id,
        ActivityName          $name,
        ActivityDescription   $description,
        OnlineGameActivityUrl $url
    ): OnlineGameActivity
    {
        return new self($id, $name, $description, $url);
    }

    public function url(): OnlineGameActivityUrl
    {
        return $this->url;
    }
}