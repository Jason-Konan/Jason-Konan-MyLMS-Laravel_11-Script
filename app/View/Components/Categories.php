<?php

namespace App\View\Components;

use App\Models\CategoriesForCourse;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Categories extends Component
{
    // public $categories;
    // public function __construct()
    // {
    //     $this->categories = CategoriesForCourse::query()->orderBy('created_at', 'desc')->paginate(4);
    // }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-end.categories');
    }
}
