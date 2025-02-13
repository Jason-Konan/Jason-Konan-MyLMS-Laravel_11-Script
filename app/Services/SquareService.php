<?php

namespace App\Services;

use Square\SquareClient;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Models\CreatePaymentResponse;
use Square\Exceptions\ApiException;

class SquareService
{
  public static function makeClient(): SquareClient
  {
    return new SquareClient([
      'accessToken' => env('SQUARE_ACCESS_TOKEN'),
      'environment' => env('SQUARE_ENVIRONMENT'),
    ]);
  }
}
