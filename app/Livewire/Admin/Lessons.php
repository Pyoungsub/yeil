<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\Purpose;
use App\Models\Group;
use App\Models\Subject;
use App\Models\AdditionalPart;
use App\Models\Schedule;
class Lessons extends Component
{

    public $groupModal;
    public $selected_group;
    public $group_name;
    public $group_name_ko;

    public function openGroupModal($id)
    {
        $this->reset(['group_name', 'group_name_ko']);
        $this->purpose = Purpose::find($id);
        $this->groupModal = true;
    }
    public function modifyGroupModal($id)
    {
        $this->selected_group = Group::find($id);
        $this->group_name = $this->selected_group->group;
        $this->group_name_ko = $this->selected_group->group_ko;
        $this->groupModal = true;
    }
    public function saveGroup()
    {
        if($this->selected_group)
        {
            $this->selected_group->update([
                'group' => $this->group_name,
                'group_ko' => $this->group_name_ko,
            ]);
        }
        else
        {
            $this->purpose->group()->create([
                'group' => $this->group_name,
                'group_ko' => $this->group_name_ko,
            ]);
        }
        $this->reset(['groupModal', 'selected_group', 'group_name', 'group_name_ko']);
    }

    public $additionalPartModal;
    public $selected_additional_part;
    public $title;
    public $price;

    public function openAdditionalPartModal($id)
    {
        $this->reset(['title', 'price']);
        $this->group = Group::find($id);
        $this->additionalPartModal = true;
    }
    public function saveAdditionalSubject()
    {
        if($this->selected_additional_subject)
        {
            $this->selected_additional_subject->update([
                'title' => $this->title,
                'price' => $this->price,
            ]);
        }
        else
        {
            $this->purpose->additional_subjects()->create([
                'title' => $this->title,
                'price' => $this->price,
            ]);
        }
        $this->reset(['additionalSubjectModal', 'title', 'price']);
    }

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
