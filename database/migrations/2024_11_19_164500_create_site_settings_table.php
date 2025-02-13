<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable();
            $table->string('app_url')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('logo_light')->nullable();
            $table->string('logo_dark')->nullable();
            $table->string('admin_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->decimal('system_revenue', 5, 2)->nullable();
            $table->decimal('tax_value', 5, 2)->nullable();
            $table->string('google_map_link')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_url')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_driver')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('default_language')->nullable();
            $table->boolean('facebook_login_status')->default(false);
            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_client_secret')->nullable();
            $table->string('facebook_redirect_url')->nullable();
            $table->boolean('google_login_status')->default(false);
            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('google_redirect_url')->nullable();
            $table->text('seo_google_tag_manager')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
