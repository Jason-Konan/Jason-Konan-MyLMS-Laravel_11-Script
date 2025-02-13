<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Course extends Model
{

    use HasFactory;


    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $casts = [
        'price' => 'decimal:2', // Assure que price est un nombre décimal avec deux décimales
        'is_active' => 'boolean', // Assure que is_active est un booléen
        'audio_enabled' => 'boolean', // Assure que audio_enabled est un booléen
        'user_id' => 'integer',
        'categories_for_course_id' => 'integer',
    ];
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'description',
        'price',
        'level',
        'language',
        'is_active',
        'user_id',
        'categories_for_course_id',
        'audio_enabled'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories_for_course()
    {
        return $this->belongsTo(CategoriesForCourse::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function paidStudentsCount()
    {
        return Payment::where('course_id', $this->id)
            ->where('status', 'paid')
            ->distinct('user_id') // Évite les doublons au niveau de la requête SQL
            ->count('user_id');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function comments_for_courses()
    {
        return $this->hasMany(CommentForCourse::class);
    }

    public function cartItems()
    {
        return $this->hasMany(\App\Models\Cart::class);
    }
    public function audioComments()
    {
        return $this->hasMany(AudioComment::class);
    }
}
