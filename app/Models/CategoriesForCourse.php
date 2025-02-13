<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesForCourse extends Model
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

    // Eager loading automatique des cours associés
    protected $with = ['courses'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'categories_for_course_id');
    }
}
