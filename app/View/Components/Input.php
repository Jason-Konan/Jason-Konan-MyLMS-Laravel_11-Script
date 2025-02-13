<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = "",
        public string $label = "",
        public string $type = "text",
        public string $help = "",
        public ?string $id = null,
        public ?string $value = null,
        public ?string $placeholder = null,

    ) {
        $this->id ??= $this->name;
    }
    /**
     * Vérifie si le fichier est une image
     */
    public function isImage(?string $file): bool
    {
        return $file && in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif']);
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}