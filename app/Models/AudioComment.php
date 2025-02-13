<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioComment extends Model
{

    use HasFactory;
    protected $with = ['course', 'user'];

    protected $fillable = ['course_id', 'user_id', 'file_path'];
    // Ajout de casts pour optimiser le typage
    protected $casts = [
        'course_id' => 'integer', // Toujours traité comme un entier
        'user_id' => 'integer', // Toujours traité comme un entier
        'file_path' => 'string', // Toujours traité comme une chaîne de caractères
    ];
    /**
     * Relation : Un commentaire audio appartient à un cours.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relation : Un commentaire audio appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
