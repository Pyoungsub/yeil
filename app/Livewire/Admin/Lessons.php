<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\Purpose;
use App\Models\Subject;
use App\Models\Schedule;
class Lessons extends Component
{
    public $scheduleModal;
    public $days;
    public $subjects = [];
    public $purpose;
    public $day_id;
    public $subject_id;
    public $selected_schedule;
    public $from;
    public $to;

    public function openScheduleModal($id)
    {
        $this->reset(['day_id', 'subject_id', 'from', 'to']);
        $this->purpose = Purpose::find($id);
        $this->subjects = Subject::where('lesson_id', $this->purpose->lesson->id)->get();
        $this->scheduleModal = true;
    }
    public function addSchedule()
    {
        if($this->selected_schedule)
        {
            $this->selected_schedule->update([
                'day_id' => $this->day_id,
                'subject_id' => $this->subject_id,
                'from' => $this->from,
                'to' => $this->to,
            ]);
        }
        else
        {
            $this->purpose->schedules()->create([
                'day_id' => $this->day_id,
                'subject_id' => $this->subject_id,
                'from' => $this->from,
                'to' => $this->to,
            ]);
        }
        
        $this->reset(['scheduleModal', 'selected_schedule', 'purpose', 'day_id', 'subject_id', 'from', 'to']);
    }
    public function modifySchedule($id)
    {
        $this->selected_schedule = Schedule::find($id);
        $this->purpose = $this->selected_schedule->purpose;
        $this->subjects = Subject::where('lesson_id', $this->purpose->lesson->id)->get();
        $this->day_id = $this->selected_schedule->day->id;
        $this->subject_id = $this->selected_schedule->subject_id;
        $this->from = $this->selected_schedule->from;
        $this->to = $this->selected_schedule->to;
        $this->scheduleModal = true;
    }
    public function deleteSchedule($id)
    {
        Schedule::find($id)->delete();
    }
    public function mount()
    {
        $this->days = Day::all();
    }
    public function render()
    {
        $ressons = Lesson::all();
        return view('livewire.admin.lessons', ['lessons' => $ressons]);
    }
}
