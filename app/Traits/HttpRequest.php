<?php

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait HttpRequest
{

  public function withBasicHeader(): PendingRequest
  {
    return Http::withHeaders([
      'Accept' => 'application/json',
      'Content-Type'  => 'application/json',
    ])
      ->baseUrl($this->baseUrl);
  }

  public function withAuthorizationHeader(): PendingRequest
  {
    return Http::withHeaders([
      'Accept' => 'application/json',
      'Content-Type'  => 'application/json',
      'Authorization' => $this->key,
    ])
      ->baseUrl($this->baseUrl);
  }
}
