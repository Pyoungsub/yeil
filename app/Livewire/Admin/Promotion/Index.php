<?php

namespace App\Livewire\Admin\Promotion;

use Livewire\Component;

use App\Models\Promotion;

use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $promotions = Promotion::orderBy('created_at', 'desc')->paginate(12);
        return view('livewire.admin.promotion.index', ['promotions' => $promotions]);
    }
}
