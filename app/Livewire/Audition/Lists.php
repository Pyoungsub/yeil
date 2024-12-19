<?php

namespace App\Livewire\Audition;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Audition;

class Lists extends Component
{
    use WithPagination;
    public function render()
    {
        $auditions = Audition::paginate(12);
        return view('livewire.audition.lists', ['auditions' => $auditions]);
    }
}
