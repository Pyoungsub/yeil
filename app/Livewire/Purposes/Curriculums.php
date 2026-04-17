<?php

namespace App\Livewire\Purposes;

use Livewire\Component;
use App\Models\Curriculum;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Curriculums extends Component
{
    use WithFileUploads;

    public $purpose;
    public $curriculumId;
    public $photo;
    public $img_path;
    public $isImageModalOpen = false;

    public function openCurriculumModal()
    {
        $this->reset(['photo', 'curriculumId']);
        $this->isImageModalOpen = true;
    }
    public function openImageModal($id)
    {
        $this->reset(['photo','img_path']);
        $this->curriculumId = $id;
        $this->isImageModalOpen = true;
    }

    public function saveImage()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
        ]);
        if($this->curriculumId){
            $this->updateImage();
        } else {
            $this->storeImage();
        }
        $this->closeImageModal();
    }

    public function delete($id)
    {
        $curriculum = Curriculum::findOrFail($id);

        if ($curriculum->img_path) {
            Storage::disk('public')->delete($curriculum->img_path);
        }
        $curriculum->delete();
    }
    public function storeImage()
    {
        $path = $this->photo->store('curriculum_photos', 'public');

        Curriculum::create([
            'purpose_id' => $this->purpose->id,
            'img_path' => $path,
        ]);
    }
    public function updateImage()
    {
        $curriculum = Curriculum::findOrFail($this->curriculumId);

        if ($curriculum->img_path) {
            Storage::disk('public')->delete($curriculum->img_path);
        }

        $path = $this->photo->store('curriculum_photos', 'public');

        $curriculum->update([
            'img_path' => $path,
        ]);
    }
    public function closeImageModal()
    {
        $this->reset(['photo', 'curriculumId']);
        $this->isImageModalOpen = false;
    }

    public function mount($purpose)
    {
        $this->purpose = $purpose;
    }

    public function render()
    {
        return view('livewire.purposes.curriculums', [
            'curricula' => $this->purpose->curricula()->latest()->get()
        ]);
    }
}
