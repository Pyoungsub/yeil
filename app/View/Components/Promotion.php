<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Promotion as Pro;

class Promotion extends Component
{
    public $promotions;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->promotions = Pro::orderBy('created_at', 'desc')->take(3)->get();;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.promotion');
    }
}
