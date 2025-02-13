<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentForCourse extends Model
{
    use HasFactory;

    // Eager loading automatique des relations souvent utilisées
    protected $with = ['user', 'course'];

    protected $fillable = [
        'content',
        'course_id',
        'user_id',
        'rating',
        'audio',
        'parent_id',
    ];

    protected $casts = [
        'content' => 'string',
        'course_id' => 'integer',
        'user_id' => 'integer',
        'rating' => 'integer',
        'audio' => 'string',
        'parent_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function parent()
    {
        return $this->belongsTo(CommentForCourse::class, 'parent_id');
    }

    /**
     * Relation : Un commentaire peut avoir plusieurs réponses.
     */
    public function replies()
    {
        return $this->hasMany(CommentForCourse::class, 'parent_id');
    }
}
