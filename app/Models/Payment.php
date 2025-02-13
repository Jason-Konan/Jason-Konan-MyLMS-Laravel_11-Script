<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'amount',
        'tax_amount',
        'revenue_amount',
        'status',
        'payment_id',
    ];

    protected $casts = [
        'amount' => 'decimal:2',       // Assure que amount est un nombre décimal avec deux décimales
        'tax_amount' => 'decimal:2',   // Assure que tax_amount est un nombre décimal avec deux décimales
        'revenue_amount' => 'decimal:2', // Assure que revenue_amount est un nombre décimal avec deux décimales
        'status' => 'string',          // Traite 'status' comme une chaîne de caractères
        'course_id' => 'integer',      // Assure que course_id est un entier
        'user_id' => 'integer',        // Assure que user_id est un entier
    ];

    // Relation : Un paiement appartient à un cours
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relation : Un paiement appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
