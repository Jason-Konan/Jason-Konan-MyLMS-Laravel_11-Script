<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id'];

    protected $casts = [
        'user_id' => 'integer',
        'course_id' => 'integer',
    ];

    // Eager loading des relations souvent utilisées
    protected $with = ['user', 'course'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
