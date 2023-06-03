<?php

namespace App\Services\Weather;

use App\Exceptions\GeneralAPIException;
use App\Interfaces\WeatherInterface;
use App\Services\Weather\DTO\CurrentDTO;
use App\Services\Weather\DTO\ForecastDTO;
use App\Services\Weather\DTO\BaseWeatherDTO;
use App\Traits\HttpRequest;

class WeatherService implements WeatherInterface
{
    use HttpRequest;

    private string $baseUrl;
    private string $key;

    public function __construct()
    {
        $this->baseUrl = config('services.openweathermap.url');
        $this->key = config('services.openweathermap.key');
    }

    public function getCurrent($place): BaseWeatherDTO
    {
        try {
            $response = $this->withBasicHeader()
                ->get("/weather?q={$place}&units=metric&appid={$this->key}");

            if ($response->successful()) {
                $currentDTO = new CurrentDTO();
                $currentDTO->fromJson(json_decode($response));

                return $currentDTO;
            } else {
                throw new GeneralAPIException("Error Processing Request", $response->status());
            }
        } catch (\Exception $e) {
            throw new GeneralAPIException("Error Processing Request", $response->status());
        }
    }

    public function getForecast($place, $cnt): BaseWeatherDTO
    {
        try {
            $response = $this->withBasicHeader()
                ->get("/forecast?q={$place}&units=metric&appid={$this->key}&cnt={$cnt}");

            if ($response->successful()) {
                $forecastDTO = new ForecastDTO();
                $forecastDTO->fromJson(json_decode($response));

                return $forecastDTO;
            } else {
                throw new GeneralAPIException("Error Processing Request", $response->status());
            }
        } catch (\Exception $e) {
            throw new GeneralAPIException("Error Processing Request", $response->status());
        }
    }
}
