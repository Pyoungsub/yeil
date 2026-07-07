<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Lesson;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Courses extends Component
{
    use WithFileUploads;

    public $admin;
    public $photoModal;
    public $selected_lesson;
    public $mainpage_lesson_photo;
    public $img_path = '';
    public $alt = '';
    public $photo;
    public $photoPreview;
    public function modify($lesson_id, $id)
    {
        $this->reset(['photoPreview']);
        $this->selected_lesson = Lesson::find($lesson_id);
        $this->mainpage_lesson_photo = $this->selected_lesson->mainpage_lesson_photos()->skip($id-1)->first();
        if($this->mainpage_lesson_photo)
        {
            $this->img_path = $this->mainpage_lesson_photo->img_path;
            $this->alt = $this->mainpage_lesson_photo->alt;
        }
        else
        {
            $this->img_path = '';
            $this->alt = '';
        }
        $this->photoModal = true;
    }
    public function save()
    {
        $this->validate([
            'alt' => 'nullable|string|max:255',
            'photo' => $this->mainpage_lesson_photo
                ? 'nullable|image|max:5120'
                : 'required|image|max:5120',
        ]);

        if ($this->mainpage_lesson_photo) {

            if ($this->photo) {

                Storage::disk('public')->delete($this->mainpage_lesson_photo->img_path);

                $path = $this->photo->storePublicly('lessons', 'public');

                $this->mainpage_lesson_photo->update([
                    'img_path' => $path,
                    'alt' => $this->alt,
                ]);

            } else {

                $this->mainpage_lesson_photo->update([
                    'alt' => $this->alt,
                ]);

            }

        } else {

            $path = $this->photo->storePublicly('lessons', 'public');

            $this->selected_lesson->mainpage_lesson_photos()->create([
                'img_path' => $path,
                'alt' => $this->alt,
            ]);
        }

        $this->reset([
            'photoModal',
            'selected_lesson',
            'img_path',
            'photo',
            'photoPreview',
            'alt',
        ]);
    }
    public function mount()
    {
        if(auth()->user() && auth()->user()->admin)
        {
            $this->admin = true;
        }
    }
    public function render()
    {
        $lessons = Lesson::with('mainpage_lesson_photos')->get();
        return view('livewire.courses', ['lessons' => $lessons]);
    }
}
