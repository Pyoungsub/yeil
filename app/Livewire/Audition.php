<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agency;
use App\Models\DisplayAudition;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Carbon\Carbon;
class Audition extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $auditions = DisplayAudition::with('audition.agency')->whereHas('audition', function ($query) {
            $query->where('date', '>=', Carbon::today());
        })
        ->join('auditions', 'display_auditions.audition_id', '=', 'auditions.id')
        ->orderBy('date', 'asc')->paginate(12);
        return view('livewire.audition', [
            'auditions' => $auditions
        ]);
    }
}
