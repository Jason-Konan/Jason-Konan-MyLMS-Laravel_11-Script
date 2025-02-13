<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessonProgress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'lesson_id', 'completed_at'];

    protected $casts = [
        'completed_at' => 'datetime', // Assure que completed_at est un objet DateTime
        'user_id' => 'integer',
        'lesson_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Scope pour les progrès terminés
    public function scopeCompleted($query)
    {
        return $query->whereNotNull('completed_at');
    }

    // Scope pour les progrès non terminés
    public function scopeNotCompleted($query)
    {
        return $query->whereNull('completed_at');
    }
}
