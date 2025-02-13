<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'name',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'published',
        'position'
    ];

    protected $casts = [
        'published' => 'boolean', // Assure que 'published' est un booléen
        'position' => 'integer',  // Assure que 'position' est un entier
    ];

    // Scope pour les pages publiées
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    // Scope pour les pages non publiées
    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
