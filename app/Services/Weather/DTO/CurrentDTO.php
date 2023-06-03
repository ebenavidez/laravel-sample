<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;

class CurrentDTO extends BaseWeatherDTO implements DtoInterface
{
    public function __construct(
        public ?Report $report = null,
        public ?City $city = null,
    ) {
    }

    public function fromJson($json)
    {
        $weather = new Weather();
        $weather->fromJson($json);

        $temp = new Temp();
        $temp->fromJson($json);

        $this->city = new City();
        $this->city->fromJson($json);

        $this->report = new Report();
        $this->report->fromJson($json);
        $this->report->weather = $weather;
        $this->report->temp = $temp;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
