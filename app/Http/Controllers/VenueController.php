<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenuePhotoRequest;
use App\Http\Requests\VenueRequest;
use App\Interfaces\VenueInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class VenueController extends Controller
{
    public function getVenuesInLocation(VenueRequest $request, VenueInterface $venueService)
    {
        $validated = $request->validated();
        $result = $venueService->searchVenues($validated['city'], $validated['place']);

        return new JsonResource([$result], 200);
    }

    public function getVenuePhotos(VenuePhotoRequest $request, VenueInterface $venueService)
    {
        $validated = $request->validated();
        $result = $venueService->getPhotos($validated['fsq_id']);

        return new JsonResource([$result], 200);
    }
}
