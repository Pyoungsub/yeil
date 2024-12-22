<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\DisplayAudition;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Audition extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $auditions = DisplayAudition::with('audition.agency')->paginate(12);
        return view('livewire.audition', [
            'auditions' => $auditions
        ]);
    }
}
