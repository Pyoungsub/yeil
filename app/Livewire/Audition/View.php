<?php

namespace App\Livewire\Audition;

use Livewire\Component;
use App\Models\Audition;

class View extends Component
{
    public $audition;

    public function mount($id)
    {
        $this->audition = Audition::with('agency')->find($id);
    }

    public function render()
    {
        return view('livewire.audition.view', ['audition' => $this->audition]);
    }
}