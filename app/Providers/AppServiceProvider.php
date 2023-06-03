<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\WeatherInterface;
use App\Interfaces\VenueInterface;
use App\Services\Weather\WeatherService;
use App\Services\Venue\VenueService;

class AppServiceProvider extends ServiceProvider
{

    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        WeatherInterface::class => WeatherService::class,
        VenueInterface::class => VenueService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
