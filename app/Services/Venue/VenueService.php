<?php

namespace App\Services\Venue;

use App\Exceptions\GeneralAPIException;
use App\Interfaces\VenueInterface;
use App\Services\Venue\DTO\BaseVenueDTO;
use App\Services\Venue\DTO\PhotoDTO;
use App\Services\Venue\DTO\VenueDTO;
use App\Traits\HttpRequest;

class VenueService implements VenueInterface
{
    use HttpRequest;

    private string $baseUrl;
    private string $key;

    public function __construct()
    {
        $this->baseUrl = config('services.foursquare.url');
        $this->key = config('services.foursquare.key');
    }

    public function searchVenues($city, $place): BaseVenueDTO
    {
        try {
            $response = $this->withAuthorizationHeader()
                ->get("/places/search?near={$city}&query={$place}");
            if ($response->successful()) {
                $venues = new VenueDTO();
                $venues->fromJson(json_decode($response));

                return $venues;
            } else {
                throw new GeneralAPIException("Error Processing Request", $response->status());
            }
        } catch (\Exception $e) {
            throw new GeneralAPIException("Error Processing Request", $response->status());
        }
    }

    public function getPhotos($id): BaseVenueDTO
    {
        try {
            $response = $this->withAuthorizationHeader()
                ->get("/places/{$id}/photos");
            if ($response->successful()) {
                $photos = new PhotoDTO();
                $photos->fromJson(json_decode($response));

                return $photos;
            } else {
                throw new GeneralAPIException("Error Processing Request", $response->status());
            }
        } catch (\Exception $e) {
            throw new GeneralAPIException("Error Processing Request", $response->status());
        }
    }
}
