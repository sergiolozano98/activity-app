<?php

namespace App\Activities\Domain\Sport\Exception;

class SportActivityNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Sport Activity not found');
    }
}