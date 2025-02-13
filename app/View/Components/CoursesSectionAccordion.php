<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoursesSectionAccordion extends Component
{
    // public $courses;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->courses = Course::with('sections.lessons')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.front-end.courses-section-accordion',
            // ['courses' => $this->courses]
        );
    }
}