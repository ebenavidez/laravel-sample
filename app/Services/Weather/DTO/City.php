<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;

class City implements DtoInterface
{
    public function __construct(
        public int $id = 0,
        public string $name = '',
        public string $lat = '',
        public string $lon = '',
    ) {
    }

    public function fromJson($json)
    {
        $this->id = $json->id;
        $this->name = $json->name;
        $this->lat = $json->coord->lat;
        $this->lon = $json->coord->lon;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
