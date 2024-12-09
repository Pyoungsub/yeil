<?php

namespace App\Livewire\Lessons;

use Livewire\Component;
use App\Models\Lesson;
use App\Models\LessonTuitionPhoto;
use App\Models\LessonTuitionVideo;
#use App\Models\LessonTuitionYoutube;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Tuitions extends Component
{
    use WithFileUploads;

    public $lesson;
    public $photo;
    public $photoPreview;
    public $img_path;
    public $selected_tuition_photo;
    public $tuitionModal;
    public function add()
    {
        $this->tuitionModal = true;
    }
    public function modify($id)
    {
        $this->selected_tuition_photo = LessonTuitionPhoto::find($id);
        $this->img_path = $this->selected_tuition_photo->img_path;
        $this->tuitionModal = true;
    }
    public function delete($id)
    {
        $lesson_tuition_photo = LessonTuitionPhoto::find($id);
        Storage::disk('public')->delete(($lesson_tuition_photo->img_path));
        $lesson_tuition_photo->delete();
    }
    public function save()
    {
        $this->validate([
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:102400'
        ]);
        if($this->photo)
        {
            $path = $this->photo->storePublicly('tuitions', 'public');
            if($this->selected_tuition_photo)
            {
                if($this->img_path)
                {
                    Storage::disk('public')->delete(($this->img_path));
                }
                $this->selected_tuition_photo->update(['img_path' => $path]);
            }
            else
            {
                $this->lesson->lesson_tuition_photos()->create(['img_path' => $path]);
            }
        }
        $this->reset(['tuitionModal', 'photo', 'img_path']);
    }
    public $video;
    protected $rules = [
        'video' => 'required|mimes:mp4,mov,avi,wmv|max:102400', // 100MB limit
    ];
    public $video_path;
    public $selected_lesson_tuition_video;
    public $tuitionVideoModal;
    public function addVideo()
    {
        $this->reset(['video', 'video_path', 'selected_lesson_tuition_video']);
        $this->tuitionVideoModal = true;
    }
    
    public function modifyVideo($id)
    {
        $this->selected_lesson_tuition_video = LessonTuitionVideo::find($id);
        $this->video_path = $this->selected_lesson_tuition_video->video_path;
        $this->tuitionVideoModal = true;
    }
    public function deleteVideo($id)
    {
        $video = LessonTuitionVideo::find($id);
        Storage::disk('public')->delete($video->video_path);
        $video->delete();
    }
    public function saveVideo()
    {
        $validated = $this->validate([ 
            'video' => 'required',
        ]);
        $path = $this->video->storePublicly('tuitions', 'public');
        if($this->selected_lesson_tuition_video)
        {
            if($this->video_path)
            {
                Storage::disk('public')->delete($this->video_path);
            }
            $this->selected_lesson_tuition_video->update(['video_path' => $path]);
        }
        else
        {
            $this->lesson->lesson_tuition_videos()->create(['video_path' => $path]);
        }
        $this->reset(['tuitionVideoModal', 'video', 'video_path', 'selected_lesson_tuition_video']);
    }
    /*
    public $link;
    public $selected_lesson_tuition_youtube;
    public $tuitionYoutubeModal;
    public function addYoutube()
    {
        $this->reset(['link', 'selected_lesson_tuition_youtube']);
        $this->tuitionYoutubeModal = true;
    }
    
    public function modifyYoutube($id)
    {
        $this->selected_lesson_tuition_youtube = LessonTuitionYoutube::find($id);
        $this->link = $this->selected_lesson_tuition_youtube->link;
        $this->tuitionYoutubeModal = true;
    }
    public function deleteYoutube($id)
    {
        LessonTuitionYoutube::find($id)->delete();
    }
    
    public function saveLink()
    {
        $validated = $this->validate([ 
            'link' => 'required|regex:/[?&]v=([\w-]{11})/',
        ]);
        preg_match('/[?&]v=([\w-]{11})/', $this->link, $matches);
        $this->link = $matches[1] ?? null;
        if($this->selected_lesson_tuition_youtube)
        {
            $this->selected_lesson_tuition_youtube->update(['link' => $this->link]);
        }
        else
        {
            $this->lesson->lesson_tuition_youtubes()->create(['link' => $this->link]);
        }
        $this->reset(['tuitionYoutubeModal', 'link', 'selected_lesson_tuition_youtube']);
    }
    */
    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.lessons.tuitions');
    }
}
