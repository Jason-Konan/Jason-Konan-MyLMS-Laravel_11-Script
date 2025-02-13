<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'rating',
    ];

    protected $casts = [
        'user_id' => 'integer', // Assure que user_id est un entier
        'course_id' => 'integer', // Assure que course_id est un entier
        'rating' => 'float', // Assure que rating est un nombre à virgule flottante
    ];

    // Relation : Une note appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : Une note appartient à un cours
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Scope pour récupérer les notes d'un utilisateur spécifique
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Scope pour récupérer les notes d'un cours spécifique
    public function scopeForCourse($query, $courseId)
    {
        return $query->where('course_id', $courseId);
    }

    // Scope pour récupérer la note moyenne d'un cours
    public function scopeAverageForCourse($query, $courseId)
    {
        return $query->where('course_id', $courseId)->avg('rating');
    }
}
