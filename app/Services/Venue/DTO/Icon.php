<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class Icon implements DtoInterface
{
    public function __construct(
        public string $prefix = '',
        public string $suffix = '',
    ) {
    }

    public function fromJson($json)
    {
        $this->prefix = $json->prefix;
        $this->suffix = $json->suffix;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
