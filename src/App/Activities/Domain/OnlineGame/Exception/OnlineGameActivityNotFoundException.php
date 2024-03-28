<?php

namespace App\Activities\Domain\OnlineGame\Exception;

class OnlineGameActivityNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Online Game Activity not found');
    }
}