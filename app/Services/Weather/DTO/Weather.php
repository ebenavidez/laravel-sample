<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;

class Weather implements DtoInterface
{
    public function __construct(
        public string $main = '',
        public string $desc = '',
        public string $icon = '',
    ) {
    }

    public function fromJson($json)
    {
        $this->main = $json->weather[0]->main;
        $this->desc = $json->weather[0]->description;
        $this->icon = $json->weather[0]->icon;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
