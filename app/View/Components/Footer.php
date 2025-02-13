<?php

namespace App\View\Components;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $pages;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->pages = Page::where('published', true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.navigation.footer', ['pages' => $this->pages]);
    }
}
