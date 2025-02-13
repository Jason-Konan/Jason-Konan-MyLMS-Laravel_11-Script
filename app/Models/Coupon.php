<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'discount', 'valid_from', 'valid_until'];

    protected $casts = [
        'discount' => 'decimal:2', // Assure que discount est un nombre décimal avec deux décimales
        'valid_from' => 'datetime', // Assure que valid_from est un objet DateTime
        'valid_until' => 'datetime', // Assure que valid_until est un objet DateTime
    ];

    // Tu peux ajouter un scope pour filtrer les coupons valides
    public function scopeValid($query)
    {
        return $query->where('valid_from', '<=', now())
            ->where('valid_until', '>=', now());
    }
}
