<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\Audition as Au;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Audition extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $auditions = Au::with('agency')->paginate(12);
        return view('livewire.audition', [
            'agencies' => Agency::paginate(12),
            'auditions' => $auditions
        ]);
    }
}
