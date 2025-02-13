<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'title',
        'slug',
        'section_id',
    ];

    protected $casts = [
        'section_id' => 'integer', // Assure que section_id est un entier
    ];

    // Relation : Un quiz appartient à une section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Relation : Un quiz peut avoir plusieurs questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Scope pour récupérer les quiz d'une section spécifique
    public function scopeForSection($query, $sectionId)
    {
        return $query->where('section_id', $sectionId);
    }
}
