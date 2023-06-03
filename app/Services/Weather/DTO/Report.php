<?php

namespace App\Services\Weather\DTO;

use App\Interfaces\DtoInterface;
use Carbon\Carbon;

class Report implements DtoInterface
{
    public function __construct(
        public string $dateTime = '',
        public ?Temp $temp = null,
        public ?Weather $weather = null,
    ) {
    }

    public function fromJson($json)
    {
        $this->dateTime = Carbon::createFromTimestampUTC($json->dt);
    }

    public function toJson(): string
    {
        return json_encode($this);
    }
}
