<?php

namespace App\View\Components;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class AbstractLayout extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = "")
    {
        $siteSettings = SiteSetting::first();
        if ($siteSettings) {
            return $this->title = $siteSettings->app_name . ($title ? " | $title" : "");
        } else {
            // Si les paramètres du site n'existent pas, utiliser un titre par défaut
            return $this->title =  config('app.name') . ($title ? " | $title" : ""); // Remplace par le titre de ton choix
        }
    }
}