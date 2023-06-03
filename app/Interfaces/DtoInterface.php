<?php

namespace App\Interfaces;

interface DtoInterface
{
    public function fromJson($json);
    public function toJson(): string;
}
