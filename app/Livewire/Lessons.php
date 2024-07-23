<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
class Lessons extends Component
{
    public $lesson;
    public function mount($lesson)
    {
        $this->lesson = Lesson::where('lesson', $lesson)->first();
    }
    public function render()
    {
        return view('livewire.lessons');
    }
}
