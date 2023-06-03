<?php

namespace App\Services\Venue\DTO;

use App\Interfaces\DtoInterface;
use App\Services\Venue\DTO\Photo;

class PhotoDTO extends BaseVenueDTO implements DtoInterface
{
    public function __construct(
        public $photos = array(),
    ) {
    }

    public function fromJson($json)
    {
        foreach ($json as $item) {
            $photo = new Photo();
            $photo->fromJson($item);

            array_push($this->photos, $photo);
        }
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
