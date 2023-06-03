<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class Photo implements DtoInterface
{
    public function __construct(
        public string $id = '',
        public string $prefix = '',
        public string $suffix = '',
        public int $width = 0,
        public int $height = 0,
    ) {
    }

    public function fromJson($json)
    {
        $this->id = $json->id;
        $this->prefix = $json->prefix;
        $this->suffix = $json->suffix;
        $this->width = $json->width;
        $this->height = $json->height;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
