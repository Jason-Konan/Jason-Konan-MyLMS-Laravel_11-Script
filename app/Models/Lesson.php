<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lesson extends Model
{
    use HasFactory;

    // Eager loading automatique des relations fréquemment utilisées
    protected $with = ['section'];

    protected $fillable = [
        'section_id',
        'title',
        'thumbnail',
        'description',
        'slug',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'slug' => 'string',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }

    // Scope pour les leçons actives
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
