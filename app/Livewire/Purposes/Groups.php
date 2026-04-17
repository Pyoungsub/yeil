<?php

namespace App\Livewire\Purposes;

use Livewire\Component;
use App\Models\GroupPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Groups extends Component
{
    use WithFileUploads;

    public $group;
    public $groupPhotoId;
    public $photo;
    public $img_path;
    public $isImageModalOpen = false;
    public function openGroupPhotoModal()
    {
        $this->reset(['photo', 'groupPhotoId']);
        $this->isImageModalOpen = true;
    }
    public function openImageModal($id)
    {
        $this->reset(['photo','img_path']);
        $this->groupPhotoId = $id;
        $this->isImageModalOpen = true;
    }

    public function saveImage()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
        ]);
        if($this->groupPhotoId){
            $this->updateImage();
        } else {
            $this->storeImage();
        }
        $this->closeImageModal();
    }

    public function delete($id)
    {
        $group_photo = GroupPhoto::findOrFail($id);

        if ($group_photo->img_path) {
            Storage::disk('public')->delete($group_photo->img_path);
        }
        $group_photo->delete();
    }
    public function storeImage()
    {
        $path = $this->photo->store('group_photo', 'public');

        GroupPhoto::create([
            'group_id' => $this->group->id,
            'img_path' => $path,
        ]);
    }
    public function updateImage()
    {
        $group_photo = GroupPhoto::findOrFail($this->groupPhotoId);

        if ($group_photo->img_path) {
            Storage::disk('public')->delete($group_photo->img_path);
        }

        $path = $this->photo->store('group_photo', 'public');

        $group_photo->update([
            'img_path' => $path,
        ]);
    }
    public function closeImageModal()
    {
        $this->reset(['photo', 'groupPhotoId']);
        $this->isImageModalOpen = false;
    }
    public function mount($group)
    {
        $this->group = $group;
    }
    public function render()
    {
        return view('livewire.purposes.groups', ['group_photos' => $this->group->group_photos()->latest()->get()]);
    }
}
