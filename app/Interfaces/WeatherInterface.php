<?php

namespace App\Interfaces;

use App\Services\Weather\DTO\BaseWeatherDTO;

interface WeatherInterface
{
    public function getCurrent(string $place): BaseWeatherDTO;
    public function getForecast(string $place, string $cnt): BaseWeatherDTO;
}
