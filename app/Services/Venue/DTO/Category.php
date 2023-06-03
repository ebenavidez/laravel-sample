<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class Category implements DtoInterface
{
    public function __construct(
        public int $id = 0,
        public string $name = '',
        public ?Icon $icon = null,
    ) {
    }

    public function fromJson($json)
    {
        $this->id = $json->id;
        $this->name = $json->name;
        $this->icon = new Icon();
        $this->icon->fromJson($json->icon);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
