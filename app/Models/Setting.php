<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'string', // Assure que la valeur est toujours une chaîne de caractères
    ];

    // Scope pour récupérer une setting par clé
    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    // Méthode pour obtenir la valeur d'une setting par clé
    public static function getValueByKey($key)
    {
        return self::where('key', $key)->value('value');
    }
}
