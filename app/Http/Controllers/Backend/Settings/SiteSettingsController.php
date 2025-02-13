<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function edit()
    {
        $siteSettings = SiteSetting::first(); // Récupère les paramètres actuels
        return view('backend.frontend-settings.index', compact('siteSettings'));
    }

    public function update(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'app_name' => 'nullable|string|max:255',
            'app_url' => 'nullable|url|max:255',
            'contact_number' => 'nullable|string|max:255',
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'admin_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,gif|max:1024',
            'facebook_link' => 'nullable|url|max:255',
            'youtube_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'twitter_link' => 'nullable|url|max:255',
            'telegram_link' => 'nullable|url|max:255',
            'system_revenue' => 'nullable|numeric',
            'tax_value' => 'nullable|numeric',
            'google_map_link' => 'nullable|url|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_url' => 'nullable|url|max:255',
            'mail_from_name' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|string|email|max:255',
            'mail_driver' => 'nullable|string|max:255',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:255',
            'default_language' => 'nullable|string|max:255',
            'facebook_login_status' => 'nullable|boolean',
            'google_login_status' => 'nullable|boolean',
            'seo_google_tag_manager' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:1000',
            'twitter_username' => 'nullable|string|max:255',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ], [
            'app_name.max' => 'Le nom de l’application ne peut pas dépasser 255 caractères.',
            'favicon.mimes' => 'Le favicon doit être un fichier de type : ico, png, jpg, gif.',
            // Ajoute d'autres messages...
        ]);
        $data = $request->only([
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

        ]);
        // Crypter les clés sensibles avant de les sauvegarder
        foreach ($data as $key => $value) {
            if (in_array($key, ['mail_password', 'facebook_client_secret', 'google_client_secret'])) {
                $data[$key] = Crypt::encryptString($value);
            }
        }
        // $data['mail_password'] = Crypt::encryptString($request->input('mail_password'));

        $siteSettings = SiteSetting::firstOrCreate([]);

        // Traitement de l'upload des fichiers (logos, favicon)
        $data['logo_light'] = $this->handleFileUpload($request, 'logo_light', 'logos/light', $siteSettings->logo_light);
        $data['logo_dark'] = $this->handleFileUpload($request, 'logo_dark', 'logos/dark', $siteSettings->logo_dark);
        $data['admin_logo'] = $this->handleFileUpload($request, 'admin_logo', 'logos/admin', $siteSettings->admin_logo);
        $data['favicon'] = $this->handleFileUpload($request, 'favicon', 'favicons', $siteSettings->favicon);

        $siteSettings->update($data);

        return back()->with('ok', 'Les paramètres généraux ont été mis à jour.');
    }
    private function handleFileUpload(Request $request, $key, $path, $currentFile = null)
    {
        if ($request->hasFile($key)) {
            // Supprimer l'ancien fichier s'il existe
            if ($currentFile) {
                Storage::disk('public')->delete($currentFile);
            }
            // Enregistrer le nouveau fichier
            return $request->file($key)->store($path, 'public');
        }
        return $currentFile;
    }
}
