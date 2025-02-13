<?php

namespace App\Providers;

use App\Models\CategoriesForCourse;
use App\Models\Course;
use App\Models\DefaultLanguageSetting;
use Illuminate\Support\Facades\Schema;
use App\Models\PaymentSetting;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('M d, Y'); ?>";
        });

        // if (Schema::hasTable('payment_settings')) {
        //     $paymentSettings = PaymentSetting::first();

        //     if ($paymentSettings) {
        //         config([
        //             'services.stripe.key' => $paymentSettings->stripe_key,
        //             'services.stripe.secret' => Crypt::decryptString($paymentSettings->stripe_secret),
        //             'services.stripe.webhook.secret' => $paymentSettings->stripe_webhook_secret,
        //             'services.stripe.currency' => $paymentSettings->currency,

        //             'paypal.sandbox.client_id' => $paymentSettings->paypal_client_id,
        //             'paypal.sandbox.secret' => Crypt::decryptString($paymentSettings->paypal_secret),


        //             'services.kkipay.key' => $paymentSettings->kkipay_key,
        //             'services.kkipay.private_key' => $paymentSettings->kkipay_private_key,
        //             'services.kkipay.secret' => $paymentSettings->kkipay_secret,
        //             'services.square.application_id' => $paymentSettings->square_application_id,
        //             'services.square.access_token' => $paymentSettings->square_access_token,
        //             'services.razorpay.key_id' => $paymentSettings->razorpay_key_id,
        //             'services.razorpay.key_secret' => $paymentSettings->razorpay_key_secret,
        //             'services.authorize_net.login_id' => $paymentSettings->authorize_net_login_id,
        //             'services.authorize_net.transaction_key' => $paymentSettings->authorize_net_transaction_key,
        //             'services.mobile_money.provider' => $paymentSettings->mobile_money_provider,
        //             'services.mobile_money.key' => $paymentSettings->mobile_money_key,
        //             'services.flutterwave.key' => $paymentSettings->flutterwave_key,
        //             'services.flutterwave.secret' => $paymentSettings->flutterwave_secret,
        //             'services.paystack.key' => $paymentSettings->paystack_key,
        //             'services.paystack.secret' => $paymentSettings->paystack_secret,

        //         ]);
        //     }
        // };
        if (Schema::hasTable('site_settings')) {
            $siteSettings = SiteSetting::first(); // Récupérer une seule fois les paramètres
            if ($siteSettings && $siteSettings->mail_password) {
                try {
                    // Tenter de décrypter la valeur
                    $mailPassword = Crypt::decryptString($siteSettings->mail_password);
                } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                    // Si la valeur est en clair, on la crypte
                    $mailPassword = $siteSettings->mail_password;

                    try {
                        $siteSettings->update([
                            'mail_password' => Crypt::encryptString($mailPassword),
                        ]);
                    } catch (\Exception $ex) {
                        Log::error('Échec de la mise à jour du mot de passe crypté : ' . $ex->getMessage());
                    }
                }

                // Configuration pour le mail
                if (isset($mailPassword)) {
                    config(['mail.mailers.smtp.password' => $mailPassword]);
                }
            }

            if ($siteSettings) {
                // Mettre à jour la langue par défaut
                if ($siteSettings->default_language) {
                    App::setLocale($siteSettings->default_language);
                }

                // Mettre à jour la configuration globale de l'application
                config([
                    'app.name' => $siteSettings->app_name,
                    'app.url' => $siteSettings->app_url,
                    'settings.tax_value' => $siteSettings->tax_value,
                    'settings.system_revenue' => $siteSettings->system_revenue,
                    'mail.default' => $siteSettings->mail_driver,
                    'mail.mailers.smtp.host' => $siteSettings->mail_host,
                    'mail.mailers.smtp.port' => $siteSettings->mail_port,

                    'mail.mailers.smtp.username' => $siteSettings->mail_username,
                    'mail.mailers.smtp.encryption' => $siteSettings->mail_encryption,
                    'mail.from.name' => $siteSettings->mail_from_name,
                    'mail.from.address' => $siteSettings->mail_from_address,

                ]);

                // Partager globalement la variable siteSettings
                View::share('siteSettings', $siteSettings);
            }
        }

        // Ajouter des données à la vue pour les pages spécifiques
        View::composer('*', function ($view) {
            $siteSettings = \App\Models\SiteSetting::first(); // Récupérer les paramètres du site
            $view->with('siteSettings', $siteSettings);

            $categories = CategoriesForCourse::all();
            $view->with('categories', $categories);

            $currentLanguage = DefaultLanguageSetting::first();
            $view->with('currentLanguage', $currentLanguage);


            $routeName = Route::currentRouteName();
            if ($routeName === 'page.detail') {
                $page = request()->route('page');
                $view->with('page', $page);
            }
        });



        // Custom binding to use 'slug' instead of 'id'
        Route::bind('course', function ($slug) {
            return Course::where('slug', $slug)->firstOrFail();
        });
        if (Schema::hasTable('default_language_settings')) {
            $locale = DefaultLanguageSetting::first()->locale ?? 'en';
            app()->setLocale($locale);
        }
    }
}
