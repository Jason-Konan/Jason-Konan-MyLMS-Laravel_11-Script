<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoursesList extends Component
{
    public $coursesList;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->coursesList =
            Course::query()->where('is_active', true)->orderBy('created_at', 'desc')->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-end.courses-list', ['coursesList' => $this->coursesList,]);
    }
}