<?php

namespace Tests\App\Activities\Domain\Adventure;

use App\Activities\Domain\Adventure\AdventureActivityMaterial;

class AdventureActivityMaterialMother
{
    public static function create(?array $value = []): AdventureActivityMaterial
    {
        return new AdventureActivityMaterial(json_encode($value ?? [["name" => "Shoes", "type" => "mountain"]]));
    }
}