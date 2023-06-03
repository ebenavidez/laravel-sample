<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class GeoBoundCircle implements DtoInterface
{
    public function __construct(
        public int $latitude = 0,
        public int $longitude = 0,
        public int $radius = 0,
    ) {
    }

    public function fromJson($json)
    {
        $this->latitude = $json->center->latitude;
        $this->longitude = $json->center->longitude;
        $this->radius = $json->radius;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
