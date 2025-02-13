<x-admin-layout title="Frontend Configuration">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64 mb-14">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Frontend
        Configuration")}} </h1>

  </div>
  <div class="flex flex-wrap my-8">
    <!-- Navigation des Onglets -->
    <div class="border-e border-gray-200 dark:border-neutral-700">
      <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist" aria-orientation="vertical">
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 active" id="tab-1" aria-selected="true" data-hs-tab="#section-1" aria-controls="section-1" role="tab">
          Paramètres généraux
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-2" aria-selected="false" data-hs-tab="#section-2" aria-controls="section-2" role="tab">
          Logos et Favicon
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-3" aria-selected="false" data-hs-tab="#section-3" aria-controls="section-3" role="tab">
          Liens des réseaux sociaux
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-4" aria-selected="false" data-hs-tab="#section-4" aria-controls="section-4" role="tab">
          Paramètres financiers
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-5" aria-selected="false" data-hs-tab="#section-5" aria-controls="section-5" role="tab">
          Configuration email
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-6" aria-selected="false" data-hs-tab="#section-6" aria-controls="section-6" role="tab">
          Connexion sociale
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-7" aria-selected="false" data-hs-tab="#section-7" aria-controls="section-7" role="tab">
          SEO
        </button>
        <button type="button" class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-2 px-2.5 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" id="tab-8" aria-selected="false" data-hs-tab="#section-8" aria-controls="section-8" role="tab">
          Informations légales
        </button>
      </nav>
    </div>

    <!-- Contenu des Onglets -->
    <div class="flex-1 ms-6">
      <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Paramètres généraux -->
        <div id="section-1" role="tabpanel" aria-labelledby="tab-1">
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="app_name" label="App Name" :value="old('app_name', $siteSettings->app_name ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="app_url" label="App URL" :value="old('app_url', $siteSettings->app_url ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="tel" name="contact_number" label="Contact Number" :value="old('contact_number', $siteSettings->contact_number ?? '')" />
            </div>
          </div>
        </div>

        <!-- Logos et Favicon -->
        <div id="section-2" class="hidden" role="tabpanel" aria-labelledby="tab-2">
          <h2 class="text-lg font-bold mb-4">Logos et Favicon</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="file" name="logo_light" label="Light Theme Logo" />
            </div>
            <div class="w-1/2">
              <x-input type="file" name="logo_dark" label="Dark Theme Logo" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="file" name="admin_logo" label="Admin Logo" />
            </div>
            <div class="w-1/2">
              <x-input type="file" name="favicon" label="Favicon" />
            </div>
          </div>
        </div>

        <!-- Liens des réseaux sociaux -->
        <div id="section-3" class="hidden" role="tabpanel" aria-labelledby="tab-3">
          <h2 class="text-lg font-bold mb-4">Liens des réseaux sociaux</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="facebook_link" label="Facebook Link" :value="old('facebook_link', $siteSettings->facebook_link ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="youtube_link" label="YouTube Link" :value="old('youtube_link', $siteSettings->youtube_link ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="instagram_link" label="Instagram Link" :value="old('instagram_link', $siteSettings->instagram_link ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="linkedin_link" label="LinkedIn Link" :value="old('linkedin_link', $siteSettings->linkedin_link ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="twitter_link" label="Twitter Link" :value="old('twitter_link', $siteSettings->twitter_link ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="telegram_link" label="Telegram Link" :value="old('telegram_link', $siteSettings->telegram_link ?? '')" />
            </div>
          </div>
        </div>

        <!-- Paramètres financiers -->
        <div id="section-4" class="hidden" role="tabpanel" aria-labelledby="tab-4">
          <h2 class="text-lg font-bold mb-4">Paramètres financiers</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="number" step="0.01" name="system_revenue" label="System Revenue (%)" :value="old('system_revenue', $siteSettings->system_revenue ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="number" step="0.01" name="tax_value" label="Tax Value (%)" :value="old('tax_value', $siteSettings->tax_value ?? '')" />
            </div>
          </div>
        </div>

        <!-- Configuration email -->
        <div id="section-5" class="hidden" role="tabpanel" aria-labelledby="tab-5">
          <h2 class="text-lg font-bold mb-4">Configuration email</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="mail_from_name" label="Mail From Name" :value="old('mail_from_name', $siteSettings->mail_from_name ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="email" name="mail_from_address" label="Mail From Address" :value="old('mail_from_address', $siteSettings->mail_from_address ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="mail_driver" label="Mail Driver" :value="old('mail_driver', $siteSettings->mail_driver ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="mail_host" label="Mail Host" :value="old('mail_host', $siteSettings->mail_host ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="number" name="mail_port" label="Mail Port" :value="old('mail_port', $siteSettings->mail_port ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="mail_username" label="Mail Username" :value="old('mail_username', $siteSettings->mail_username ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="password" name="mail_password" label="Mail Password" value="{{ old('mail_password', isset($siteSettings->mail_password) ? Crypt::decryptString($siteSettings->mail_password) : '') }}" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="mail_encryption" label="Mail Encryption" :value="old('mail_encryption', $siteSettings->mail_encryption ?? '')" />
            </div>
          </div>
        </div>

        <!-- Connexion sociale -->
        <div id="section-6" class="hidden" role="tabpanel" aria-labelledby="tab-6">
          <h2 class="text-lg font-bold mb-4">Options de connexion sociale</h2>
          <!-- Facebook Login -->
          <h3 class="text-md font-semibold mt-4">Facebook Login</h3>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="facebook_client_id" label="Client ID" :value="old('facebook_client_id', $siteSettings->facebook_client_id ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="password" name="facebook_client_secret" label="Client Secret" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="facebook_redirect_url" label="Redirect URL" :value="old('facebook_redirect_url', $siteSettings->facebook_redirect_url ?? '')" />
            </div>
          </div>

          <!-- Google Login -->
          <h3 class="text-md font-semibold mt-4">Google Login</h3>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="google_client_id" label="Client ID" :value="old('google_client_id', $siteSettings->google_client_id ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="password" name="google_client_secret" label="Client Secret" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="google_redirect_url" label="Redirect URL" :value="old('google_redirect_url', $siteSettings->google_redirect_url ?? '')" />
            </div>
          </div>
        </div>

        <!-- SEO -->
        <div id="section-7" class="hidden" role="tabpanel" aria-labelledby="tab-7">
          <h2 class="text-lg font-bold mb-4">Informations SEO</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-textarea name="seo_google_tag_manager" label="Google Tag Manager Code" rows="4">
                {{ old('seo_google_tag_manager', $siteSettings->seo_google_tag_manager ?? '') }}
              </x-textarea>
            </div>
            <div class="w-1/2">
              <x-input type="text" name="meta_title" label="Meta Title" :value="old('meta_title', $siteSettings->meta_title ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-textarea name="meta_description" label="Meta Description" rows="4">
                {{ old('meta_description', $siteSettings->meta_description ?? '') }}
              </x-textarea>
            </div>
            <div class="w-1/2">
              <x-input type="text" name="meta_keywords" label="Meta Keywords (séparés par des virgules)" :value="old('meta_keywords', $siteSettings->meta_keywords ?? '')" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="text" name="twitter_username" label="Twitter Username" :value="old('twitter_username', $siteSettings->twitter_username ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="file" name="twitter_image" label="Twitter Image" />
            </div>
          </div>
          <div class="flex space-x-6 mt-4">
            <div class="w-1/2">
              <x-input type="file" name="og_image" label="Open Graph Image" />
            </div>
          </div>
        </div>

        <!-- Informations légales -->
        <div id="section-8" class="hidden" role="tabpanel" aria-labelledby="tab-8">
          <h2 class="text-lg font-bold mb-4">Informations légales</h2>
          <div class="flex space-x-6">
            <div class="w-1/2">
              <x-input type="text" name="company_name" label="Company Name" :value="old('company_name', $siteSettings->company_name ?? '')" />
            </div>
            <div class="w-1/2">
              <x-input type="text" name="company_url" label="Company Website URL" :value="old('company_url', $siteSettings->company_url ?? '')" />
            </div>
          </div>
        </div>

        <!-- Bouton de soumission -->
        <div class="mt-6">
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Mettre à jour</button>
        </div>
      </form>
    </div>
  </div>



</x-admin-layout>
{{-- <select id="tab-select" class="sm:hidden py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" aria-label="Tabs">
  <option value="#hs-tab-to-select-1">Tab 1</option>
  <option value="#hs-tab-to-select-2">Tab 2</option>
  <option value="#hs-tab-to-select-3">Tab 3</option>
</select>

<div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700">
  <nav class="flex gap-x-2" aria-label="Tabs" role="tablist" data-hs-tab-select="#tab-select">
    <button type="button" class="hs-tab-active:bg-white hs-tab-active:border-b-transparent hs-tab-active:text-blue-600 dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white -mb-px py-3 px-4 inline-flex items-center gap-x-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-t-lg hover:text-gray-700 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200 active" id="hs-tab-to-select-item-1" aria-selected="true" data-hs-tab="#hs-tab-to-select-1" aria-controls="hs-tab-to-select-1" role="tab">
      Tab 1
    </button>
    <button type="button" class="hs-tab-active:bg-white hs-tab-active:border-b-transparent hs-tab-active:text-blue-600 dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white -mb-px py-3 px-4 inline-flex items-center gap-x-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-t-lg hover:text-gray-700 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" id="hs-tab-to-select-item-2" aria-selected="false" data-hs-tab="#hs-tab-to-select-2" aria-controls="hs-tab-to-select-2" role="tab">
      Tab 2
    </button>
    <button type="button" class="hs-tab-active:bg-white hs-tab-active:border-b-transparent hs-tab-active:text-blue-600 dark:hs-tab-active:bg-neutral-800 dark:hs-tab-active:border-b-gray-800 dark:hs-tab-active:text-white -mb-px py-3 px-4 inline-flex items-center gap-x-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-t-lg hover:text-gray-700 focus:outline-none focus:text-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200" id="hs-tab-to-select-item-3" aria-selected="false" data-hs-tab="#hs-tab-to-select-3" aria-controls="hs-tab-to-select-3" role="tab">
      Tab 3
    </button>
  </div>
</div>

<div class="mt-3">
  <div id="hs-tab-to-select-1" role="tabpanel" aria-labelledby="hs-tab-to-select-item-1">
    <div class="p-3 sm:p-0">
      <p class="text-gray-500 dark:text-neutral-400">
        This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">first</em> item's tab body.
      </p>
    </div>
  </div>
  <div id="hs-tab-to-select-2" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-2">
    <div class="p-3 sm:p-0">
      <p class="text-gray-500 dark:text-neutral-400">
        This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em> item's tab body.
      </p>
    </div>
  </div>
  <div id="hs-tab-to-select-3" class="hidden" role="tabpanel" aria-labelledby="hs-tab-to-select-item-3">
    <div class="p-3 sm:p-0">
      <p class="text-gray-500 dark:text-neutral-400">
        This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab body.
      </p>
    </div>
  </div>
</div> --}}
