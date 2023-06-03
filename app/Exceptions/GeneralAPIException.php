<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralAPIException extends Exception
{
    public function render()
    {
        return new JsonResource([
            'errors' => [
                'message' => $this->getMessage()
            ]
        ], $this->code);
    }
}
