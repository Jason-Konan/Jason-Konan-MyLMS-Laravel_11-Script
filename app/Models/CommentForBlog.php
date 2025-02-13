<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentForBlog extends Model
{
    use HasFactory;

    // Eager loading automatique de l'utilisateur
    protected $with = ['user'];

    protected $fillable = [
        'content',
        'blog_id',
        'user_id',
    ];

    protected $casts = [
        'content' => 'string',
        'blog_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
