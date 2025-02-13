<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // protected $with = ['category_for_blog', 'user']; // Eager loading des relations souvent utilisées

    protected $fillable = [
        'thumbnail',
        'title',
        'slug',
        'excerpt',
        'content',
        'user_id',
        'category_for_blog_id',
    ];

    protected $casts = [
        'user_id' => 'integer', // Cast pour assurer un typage strict
        'category_for_blog_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category_for_blog()
    {
        return $this->belongsTo(CategoryForBlog::class);
    }

    public function comment_for_blog()
    {
        return $this->hasMany(CommentForBlog::class);
    }
}
