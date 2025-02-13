<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'profession',
        'bio',
        'address',
        'phone',
        'gender',
        'country',
        'city',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'gender' => Gender::class,
        ];
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(CommentForCourse::class);
    }
    public function blogComments(): HasMany
    {
        return $this->hasMany(CommentForBlog::class);
    }
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class)->withTimestamps()->withPivot('finished');
    }
    public function hasPurchased(Course $course)
    {
        return $this->payments()->where('course_id', $course->id)->exists();
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function lessonProgress()
    {
        return $this->hasMany(LessonProgress::class);
    }
    public function getCourseProgress($courseId)
    {
        $course = Course::findOrFail($courseId);

        $totalLessons = $course->sections->sum(fn($section) => $section->lessons->count());
        $completedLessons = $this->lessons()
            ->wherePivot('finished', true)
            ->whereHas('section.course', fn($query) => $query->where('id', $courseId))
            ->count();

        return [
            'completedLessons' => $completedLessons,
            'totalLessons' => $totalLessons,
            'percentage' => $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0,
        ];
    }
    public function audioComments()
    {
        return $this->hasMany(AudioComment::class);
    }
}
