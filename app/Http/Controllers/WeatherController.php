<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrentWeatherRequest;
use App\Http\Requests\ForecastRequest;
use App\Interfaces\WeatherInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherController extends Controller
{
    public function getCurrentWeather(CurrentWeatherRequest $request, WeatherInterface $weatherService)
    {
        $validated = $request->validated();
        $result = $weatherService->getCurrent($validated['place']);

        return new JsonResource([$result], 200);
    }

    public function getForecast(ForecastRequest $request, WeatherInterface $weatherService)
    {
        $validated = $request->validated();
        $result = $weatherService->getForecast($validated['place'], $validated['cnt']);

        return new JsonResource([$result], 200);
    }
}
