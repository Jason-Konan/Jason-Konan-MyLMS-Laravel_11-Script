<?php

namespace App\Services;

use App\Models\PaymentGateway;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class KkiapayService
{
  protected $client;
  protected $publicKey;
  protected $privateKey;
  protected $secret;
  protected $baseUrl;

  public function __construct()
  {
    $this->client = new Client();

    // Récupérer la configuration de la passerelle Kkiapay depuis la base de données
    $kkiapayGateway = PaymentGateway::where('name', 'kkiapay')->first();

    if ($kkiapayGateway) {
      $this->publicKey = $kkiapayGateway->api_key;
      $this->privateKey = $kkiapayGateway->api_private;
      $this->secret = $kkiapayGateway->api_secret;
      $this->baseUrl = env('KKIAPAY_URL', 'https://api.kkiapay.me');
    } else {
      // Utiliser les valeurs du fichier .env si les données ne sont pas trouvées
      $this->publicKey = env('KKIAPAY_PUBLIC_KEY');
      $this->privateKey = env('KKIAPAY_PRIVATE_KEY');
      $this->secret = env('KKIAPAY_SECRET');
      $this->baseUrl = env('KKIAPAY_URL', 'https://api.kkiapay.me');
    }

    if (empty($this->secret)) {
      throw new \RuntimeException('Kkiapay API keys are not configured.');
    }
  }

  public function initiatePayment($amount, $phone, $callbackUrl = null, $metadata = [])
  {
    try {
      $response = $this->client->post("{$this->baseUrl}/api/v1/transactions", [
        'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'Authorization' => 'Bearer ' . $this->secret,
        ],
        'json' => [
          'amount' => $amount,
          'phone' => $phone,
          'callback_url' => $callbackUrl,
          'metadata' => $metadata,
        ],
      ]);

      return json_decode($response->getBody(), true);
    } catch (RequestException $e) {
      return [
        'error' => true,
        'message' => $e->getMessage(),
        'statusCode' => $e->getCode(),
      ];
    }
  }

  public function verifyTransaction($transactionId)
  {
    try {
      $response = $this->client->get("{$this->baseUrl}/api/v1/transactions/{$transactionId}", [
        'headers' => [
          'Accept' => 'application/json',
          'Authorization' => 'Bearer ' . $this->secret,
        ],
      ]);

      return json_decode($response->getBody(), true);
    } catch (RequestException $e) {
      return [
        'error' => true,
        'message' => $e->getMessage(),
        'statusCode' => $e->getCode(),
      ];
    }
  }
}
