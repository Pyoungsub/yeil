<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Facility;
class Facilities extends Component
{
    use WithFileUploads;
    public $selected_facility;
    public $description;
    public $img_path;
    public $photo;
    public $photoPreview;
    public $facilityModal;
    
    public function add()
    {
        $this->reset(['selected_facility', 'description', 'img_path', 'photo', 'photoPreview']);
        $this->facilityModal = true;
    }
    public function modify($id)
    {
        $this->reset(['selected_facility', 'description', 'img_path', 'photo', 'photoPreview']);
        $this->selected_facility = Facility::find($id);
        $this->description = $this->selected_facility->description;
        $this->img_path = $this->selected_facility->img_path;
        $this->facilityModal = true;
    }
    public function delete($id)
    {
        $facility = Facility::find($id);
        Storage::disk('public')->delete($facility->img_path);
        $facility->delete();
    }
    public function save()
    {
        $validated = $this->validate([ 
            'description' => 'required|min:3',
            'photo' => 'nullable|required_if:selected_facility,true|image',
        ]);
        if($this->selected_facility)
        {
            if($this->photo)
            {
                Storage::disk('public')->delete($this->selected_facility->img_path);
                $img_path = $this->photo->storePublicly('facilities', 'public');
                $this->selected_facility->update(['description' => $this->description, 'img_path' => $img_path]);
            }
            else
            {
                $this->selected_facility->update(['description' => $this->description]);
            }
        }
        else
        {
            $img_path = $this->photo->storePublicly('facilities', 'public');
            Facility::create(['description' => $this->description, 'img_path' => $img_path]);
        }
        $this->reset(['facilityModal', 'selected_facility', 'description', 'img_path', 'photo', 'photoPreview']);
    }
    public function render()
    {
        $facilities = Facility::get();
        return view('livewire.facilities', ['facilities' => $facilities]);
    }
}
