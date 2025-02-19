<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultLanguageSetting extends Model
{
    use HasFactory;

    protected $fillable = ['locale'];
}
