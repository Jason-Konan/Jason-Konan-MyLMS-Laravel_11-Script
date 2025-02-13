<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navlink extends Component
{

    // public $id;
    // public $title;
    // public $icon;
    // public $subItems;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public string $title = "",
        public string $icon = "",
        public ?array $subItems = []
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->icon = $icon;
        $this->subItems = $subItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.navigation.navlink');
    }
}