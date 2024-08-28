<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Lesson;

class Courses extends Component
{
    public $lessons;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->lessons = Lesson::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.courses');
    }
}
