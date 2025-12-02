<?php

namespace App\Livewire\Audition;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Audition;

class Lists extends Component
{
    use WithPagination;
    public function render()
    {
        $auditions = Audition::where('date', '>=', Carbon::today())
        ->orderBy('date', 'asc')->paginate(12);
        return view('livewire.audition.lists', ['auditions' => $auditions]);
    }
}
