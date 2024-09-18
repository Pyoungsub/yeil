<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Part;
class Schedules extends Component
{
    public function render()
    {
        $parts = Part::all();
        return view('livewire.admin.schedules', ['parts' => $parts]);
    }
}
