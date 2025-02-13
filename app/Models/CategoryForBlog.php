<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryForBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'slug',
        'description',
    ];

    protected $casts = [
        'image',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
    ];

    // Eager loading automatique des blogs associés
    protected $with = ['blogs'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
