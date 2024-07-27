<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
class Purposes extends Component
{
    public $lesson;
    public $purpose;
    public function mount($lesson, $purpose)
    {
        $this->lesson = Lesson::where('lesson', $lesson)->first();
        if($this->lesson)
        {
            $this->purpose = $this->lesson->purposes()->where('purpose', $purpose)->first();
        }
    }
    public function render()
    {
        return view('livewire.purposes');
    }
}
