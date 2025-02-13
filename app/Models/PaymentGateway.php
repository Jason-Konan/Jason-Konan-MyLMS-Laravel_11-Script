<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'api_key',
        'api_secret',
        'api_private',
        'webhook_secret',
        'currency',
    ];
    protected $casts = [
        'currency' => 'string', // Assure que 'currency' est traité comme une chaîne
    ];
}
