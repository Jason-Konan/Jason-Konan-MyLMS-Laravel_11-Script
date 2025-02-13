<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;
    protected $with = ['student', 'question'];

    protected $fillable = [
        'student_id',
        'question_id',
        'answer',
    ];
    protected $casts = [
        'student_id' => 'integer', // S'assure que student_id est toujours un entier
        'question_id' => 'integer', // S'assure que question_id est toujours un entier
        'answer' => 'string', // Convertit la réponse en chaîne de caractères (si ce n'est pas déjà le cas)
        'deleted_at' => 'datetime', // Si tu veux manipuler `deleted_at` comme un objet DateTime
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
