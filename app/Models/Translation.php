<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    // Définition des attributs mass assignables
    protected $fillable = [
        'key',    // La clé de la traduction (par exemple 'welcome_message')
        'locale', // La langue de la traduction (par exemple 'en', 'fr')
        'value',  // La valeur traduite
    ];

    /**
     * La méthode pour récupérer la clé utilisée pour générer les routes.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'key'; // Utilisation de la clé pour générer les routes (si nécessaire)
    }

    /**
     * Accesseur pour obtenir la traduction par langue spécifique.
     *
     * @param string $locale
     * @return string|null
     */
    public static function getTranslation(string $locale, string $key)
    {
        // Recherche d'une traduction spécifique pour une clé et une locale données
        return self::where('locale', $locale)
            ->where('key', $key)
            ->first()?->value; // Retourne null si aucune traduction trouvée
    }
}
