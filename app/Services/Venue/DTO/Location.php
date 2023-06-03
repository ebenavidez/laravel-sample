<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;

class Location implements DtoInterface
{
    public function __construct(
        public string $address = '',
        public string $addressExtended = '',
        public string $country = '',
        public string $locality = '',
        public string $region = '',
        public string $postCode = '',
        public string $formattedAddress = '',
    ) {
    }

    public function fromJson($json)
    {
        $this->address = $json->address;
        $this->addressExtended = $json->address_extended ?? '';
        $this->country = $json->country;
        $this->locality = $json->locality;
        $this->region = $json->region;
        $this->postCode = $json->postcode;
        $this->formattedAddress = $json->formatted_address;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
