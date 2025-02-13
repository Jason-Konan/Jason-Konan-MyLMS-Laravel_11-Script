<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'app_name',
        'app_url',
        'contact_number',
        'logo_light',
        'logo_dark',
        'admin_logo',
        'favicon',
        'facebook_link',
        'youtube_link',
        'instagram_link',
        'linkedin_link',
        'twitter_link',
        'telegram_link',
        'system_revenue',
        'tax_value',
        'google_map_link',
        'company_name',
        'company_url',
        'mail_from_name',
        'mail_from_address',
        'mail_driver',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'default_language',
        'facebook_login_status',
        'facebook_client_id',
        'facebook_client_secret',
        'facebook_redirect_url',
        'google_login_status',
        'google_client_id',
        'google_client_secret',
        'google_redirect_url',
        'seo_google_tag_manager',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'twitter_username',
        'twitter_image',
        'og_image',
    ];

    // Cast pour s'assurer que les champs numériques ou booléens sont correctement traités
    protected $casts = [
        'system_revenue' => 'float',
        'tax_value' => 'float',
        'facebook_login_status' => 'boolean',
        'google_login_status' => 'boolean',
        'seo_google_tag_manager' => 'string',
        'twitter_image' => 'string',
        'og_image' => 'string',
    ];

    // Scope pour récupérer une setting par son nom
    public function scopeByKey($query, $key)
    {
        return $query->where('key', $key);
    }

    // Méthode pour obtenir une valeur spécifique directement par la clé
    public static function getValue($key)
    {
        return self::where('key', $key)->value('value');
    }
}
