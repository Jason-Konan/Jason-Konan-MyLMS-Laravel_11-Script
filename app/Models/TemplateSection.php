<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'template_path', 'is_active'];
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
