<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class VenueDTO extends BaseVenueDTO implements DtoInterface
{
    public function __construct(
        public $venues = array(),
        public ?GeoBoundCircle $geoBoundCircle = null,
    ) {
    }

    public function fromJson($json)
    {
        foreach ($json->results as $item) {
            $venue = new Venue();
            $venue->fromJson($item);

            array_push($this->venues, $venue);
        }

        $this->geoBoundCircle = new GeoBoundCircle();
        $this->geoBoundCircle->fromJson($json->context->geo_bounds->circle);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
