<?php

namespace App\Livewire\Audition;

use Livewire\Component;
use App\Models\Audition;
use App\Models\DisplayAudition;
class View extends Component
{
    public $audition;

    public function delete()
    {
        $this->audition->delete();
        DisplayAudition::orderBy('order', 'asc')
        ->get()
        ->each(function ($item, $index) {
            $item->order = $index + 1;
            $item->save();
        });
        return redirect()->route('audition.lists');
    }
    public function mount($id)
    {
        $this->audition = Audition::with('agency')->find($id);
    }

    public function render()
    {
        return view('livewire.audition.view', ['audition' => $this->audition]);
    }
}