<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class Venue implements DtoInterface
{
    public function __construct(
        public string $fsq_id = '',
        public string $name = '',
        public string $timezone = '',
        public $categories = array(),
        public ?GeoCodes $geoCodes = null,
        public ?Location $location = null,
    ) {
    }

    public function fromJson($json)
    {
        $this->fsq_id = $json->fsq_id;
        $this->name = $json->name;
        $this->timezone = $json->timezone;

        foreach ($json->categories as $item) {
            $category = new Category();
            $category->fromJson($item);
            array_push($this->categories, $category);
        }

        $this->geoCodes = new GeoCodes();
        $this->geoCodes->fromJson($json->geocodes);

        $this->location = new Location();
        $this->location->fromJson($json->location);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
