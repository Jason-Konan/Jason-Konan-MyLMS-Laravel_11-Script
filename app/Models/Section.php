<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'name',
        'slug',
        'course_id',
    ];

    protected $casts = [
        'course_id' => 'integer', // Assure que course_id est un entier
    ];

    // Relation : Une section appartient à un cours
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relation : Une section peut avoir plusieurs leçons
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Relation : Une section peut avoir plusieurs quiz
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    // Scope pour récupérer les sections d'un cours spécifique
    public function scopeForCourse($query, $courseId)
    {
        return $query->where('course_id', $courseId);
    }
}
