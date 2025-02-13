<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'email', 'review', 'rating', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
