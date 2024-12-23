<?php

namespace App\Livewire\Promotion;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Promotion;

class Lists extends Component
{
    use WithPagination;
    public function render()
    {
        $promotions = Promotion::paginate(12);
        return view('livewire.promotion.lists', ['promotions' => $promotions]);
    }
}
