<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'templateSection',
        'title_fr',
        'title_en',
        'title_es',
        'title_it',
        'description_fr',
        'description_en',
        'description_es',
        'description_it'
    ];
}
