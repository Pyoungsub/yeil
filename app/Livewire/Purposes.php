<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Lesson;
use App\Models\Curriculum;
use App\Models\PurposeYoutube;
class Purposes extends Component
{
    use WithFileUploads;
    public $lesson;
    public $purpose;

    public $curriculumModal;
    public $selected_curriculum;
    public $title;
    public $sub_title;
    public $img_path;
    public $photo;
    public $photoPreview;

    public $youtubeModal;
    public $selected_youtube;
    public $link;

    public function addCurriculum()
    {
        $this->reset(['selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
        $this->curriculumModal = true;
    }
    public function modify($id)
    {
        $this->reset(['selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
        $this->selected_curriculum = Curriculum::find($id);
        $this->title = $this->selected_curriculum->title;
        $this->sub_title = $this->selected_curriculum->sub_title;
        $this->img_path = $this->selected_curriculum->img_path;
        $this->curriculumModal = true;
    }
    public function deletePhoto()
    {
        Storage::disk('public')->delete($this->selected_curriculum->img_path);
        $this->reset('img_path');
    }
    public function save()
    {
        $this->validate([
            'title' => 'nullable|string|min:2',
            'sub_title' => 'nullable|string|min:2',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:102400'
        ]);
        if($this->selected_curriculum)
        {
            $curriculum = $this->selected_curriculum;
            $curriculum->update([
                'title' => $this->title,
                'sub_title' => $this->sub_title,
            ]);
        }
        else
        {
            $curriculum = $this->purpose->curricula()->create([
                'title' => $this->title,
                'sub_title' => $this->sub_title,
            ]);
        }
        if($this->photo)
        {
            if($curriculum->img_path)
            {
                Storage::disk('public')->delete($curriculum->img_path);
            }
            $path = $this->photo->storePublicly('curricula', 'public');
            $curriculum->update(['img_path' => $path]);
        }
        $this->reset(['curriculumModal', 'selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
    }
    public function addYoutube()
    {
        $this->reset(['link']);
        $this->youtubeModal = true;
    }
    public function saveLink()
    {
        if($this->selected_youtube)
        {
            $this->selected_youtube->update(['link' => $this->link]);
        }
        else
        {
            $this->purpose->purpose_youtubes()->create([
                'link' => $this->link
            ]);
        }
        $this->reset(['selected_youtube', 'link', 'youtubeModal']);
    }
    public function modifyYoutube($id)
    {
        $this->selected_youtube = PurposeYoutube::find($id);
        $this->link = $this->selected_youtube->link;
        $this->youtubeModal = true;
    }
    public function deleteYoutube($id)
    {
        PurposeYoutube::find($id)->delete();
    }
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
        $purpose_youtubes = $this->purpose->purpose_youtubes()->take(10)->get();
        return view('livewire.purposes', ['purpose_youtubes' => $purpose_youtubes]);
    }
}
