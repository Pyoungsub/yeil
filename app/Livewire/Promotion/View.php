<?php

namespace App\Livewire\Promotion;

use Livewire\Component;
use App\Models\Promotion;
class View extends Component
{
    public $promotion;

    public function mount($id)
    {
        $this->promotion = Promotion::find($id);
    }
    public function render()
    {
        return view('livewire.promotion.view', ['promotion' => $this->promotion]);
    }
}
