<?php

namespace App\Activities\Domain\Adventure\Exception;

class AdventureActivityNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Adventure Activity not found');
    }
}