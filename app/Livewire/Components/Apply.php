<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Lesson;
class Apply extends Component
{
    public $programs = [];
    public function mount()
    {
        $this->programs = Lesson::with('purposes.groups.parts')->get()->toArray();
    }
    public function render()
    {
        return view('livewire.components.apply');
    }
}
