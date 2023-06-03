<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;

class Temp implements DtoInterface
{
    public function __construct(
        public string $temp = '',
        public string $feelsLike = '',
        public string $tempMin = '',
        public string $tempMax = '',
        public string $humidity = '',
    ) {
    }

    public function fromJson($json)
    {
        $this->temp = $json->main->temp;
        $this->feelsLike = $json->main->feels_like;
        $this->tempMin = $json->main->temp_min;
        $this->tempMax = $json->main->temp_max;
        $this->humidity = $json->main->humidity;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
