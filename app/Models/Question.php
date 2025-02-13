<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'quiz_id',
        'content',
        'type',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'correct_answer',
    ];

    protected $casts = [
        'quiz_id' => 'integer', // Assure que quiz_id est un entier
        'correct_answer' => 'string', // Assure que correct_answer est une chaîne de caractères
    ];

    // Relation : Une question appartient à un quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relation : Une question peut avoir plusieurs réponses
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    // Scope pour récupérer les questions d'un quiz spécifique
    public function scopeForQuiz($query, $quizId)
    {
        return $query->where('quiz_id', $quizId);
    }

    // Scope pour récupérer les questions par type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }
}
