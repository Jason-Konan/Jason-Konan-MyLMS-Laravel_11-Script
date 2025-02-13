<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'hosted_by',
        'location',
        'date',
        'topic',
        'goal',
        'image',
    ];

    protected $casts = [
        'date' => 'datetime', // Assure que date est un objet DateTime
        'title' => 'string',
        'description' => 'string',
        'hosted_by' => 'string',
        'location' => 'string',
        'topic' => 'string',
        'goal' => 'string',
        'image' => 'string',
    ];

    // Scope pour les événements à venir
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now());
    }

    // Scope pour les événements passés
    public function scopePast($query)
    {
        return $query->where('date', '<', now());
    }
}
