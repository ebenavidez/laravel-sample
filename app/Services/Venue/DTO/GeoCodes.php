<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class GeoCodes implements DtoInterface
{
    public function __construct(
        public int $lat = 0,
        public int $lon = 0,
    ) {
    }

    public function fromJson($json)
    {
        $this->lat = $json->main->latitude;
        $this->lon = $json->main->longitude;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
