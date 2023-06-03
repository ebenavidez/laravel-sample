<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;

class ForecastDTO extends BaseWeatherDTO implements DtoInterface
{
    public function __construct(
        public $reports = array(),
        public ?City $city = null,
    ) {
    }

    public function fromJson($json)
    {
        $this->city = new City();
        $this->city->fromJson($json->city);

        foreach ($json->list as $item) {
            $weather = new Weather();
            $weather->fromJson($item);

            $temp = new Temp();
            $temp->fromJson($item);

            $report = new Report();
            $report->fromJson($item);
            $report->weather = $weather;
            $report->temp = $temp;

            array_push($this->reports, $report);
        }
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
