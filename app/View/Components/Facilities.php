<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Facility;

class Facilities extends Component
{
    public $facilities;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->facilities = Facility::where('display', true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.facilities');
    }
}
