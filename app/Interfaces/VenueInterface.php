<?php

namespace App\Interfaces;

use App\Services\Venue\DTO\BaseVenueDTO;

interface VenueInterface
{
    public function searchVenues(string $city, string $place): BaseVenueDTO;
    public function getPhotos(string $id): BaseVenueDTO;
}
