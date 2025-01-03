<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use App\Models\Purpose;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Lessons extends Component
{
    use WithFileUploads;
    public $lesson;
    public $lesson_main_video;

    public $video;
    public $video_path;
    public $mainVideoModal;
    public function modifyMainVideo()
    {
        $this->reset('video_path');
        if($this->lesson->lesson_main_video)
        {
            $this->video_path = $this->lesson->lesson_main_video->video_path;
        }
        $this->mainVideoModal = true;
    }
    public function saveMainVideo()
    {
        $validated = $this->validate([ 
            'video' => 'required',
        ]);
        $video_path = $this->video->storePublicly('lessons', 'public');
        if($this->video_path)
        {
            Storage::disk('public')->delete($this->video_path);
        }
        $this->lesson->lesson_main_video()->updateOrCreate(
            ['lesson_id' => $this->lesson->id],
            ['video_path' => $video_path]
        );
        $this->reset(['mainVideoModal', 'video', 'video_path']);
    }
    public $link;
    public $selected_youtube;
    public $youtubeModal;
    
    public function modifyYoutube()
    {
        $this->reset('link');
        if($this->lesson->lesson_youtube)
        {
            $this->selected_youtube = $this->lesson->lesson_youtube;
            $this->link = $this->selected_youtube->link;
        }
        $this->youtubeModal = true;
    }
    public function saveYoutube()
    {
        if($this->selected_youtube)
        {
            $this->selected_youtube->update(['link' => $this->link]);
        }
        else
        {
            $this->lesson->lesson_youtube()->firstOrCreate(
                ['lesson_id' => $this->lesson->id],
                ['link' => $this->link]
            );
        }
        $this->reset(['selected_youtube', 'link', 'youtubeModal']);
    }
    
    public $selected_purpose;
    public $img_path;
    public $photo;
    public $photoPreview;
    public $purposeModal;
   
    public function modify($id)
    {
        $this->reset(['selected_purpose', 'img_path', 'photo', 'photoPreview']);
        $this->selected_purpose = Purpose::find($id);
        if($this->selected_purpose->purpose_photo)
        {
            $this->img_path = $this->selected_purpose->purpose_photo->img_path;
        }
        $this->purposeModal = true;
    }
    public function save()
    {
        if($this->img_path)
        {
            Storage::disk('public')->delete(($this->img_path));
        }
        $path = $this->photo->storePublicly('purposes', 'public');
        $this->selected_purpose->purpose_photo()->updateOrCreate(
            ['purpose_id' => $this->selected_purpose->id],
            ['img_path' => $path]
        );
        $this->reset(['purposeModal', 'selected_purpose', 'img_path', 'photo', 'photoPreview']);
    }
    public function mount($lesson)
    {
        $this->lesson = Lesson::where('lesson', $lesson)->first();
        $this->lesson->lesson_main_video ? $this->lesson_main_video = $this->lesson->lesson_main_video->video_path : 'video/7cf4958d5002916a5141c3b18de475d8.mp4';
    }
    public function render()
    {
        return view('livewire.lessons');
    }
}
