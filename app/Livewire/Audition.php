<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Agency;
use App\Models\Audition as Au;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Audition extends Component
{
    use WithFileUploads, WithPagination, WithoutUrlPagination; 

    public $addAgencyModal;
    public $name;
    public $logoPreview;
    public $logo;
    public $logo_path;
    public $bg_color;
    public $text_color;
    public function addAgency()
    {
        $this->reset(['name', 'logo', 'logo_path', 'bg_color', 'text_color']);
        $this->addAgencyModal = true;
    }
    public function saveAgency()
    {
        $validated = $this->validate([ 
            'name' => 'required|min:1|unique:agencies,name',
            'logo' => 'required|image',
            'bg_color' => 'required|hex_color',
            'text_color' => 'required|hex_color',
        ]);
        $path = $this->logo->storePublicly('logos', 'public');
        Agency::create([
            'name' => $this->name,
            'logo_path' => $path,
            'bg_color' => $this->bg_color,
            'text_color' => $this->text_color
        ]);
        $this->reset(['addAgencyModal', 'name', 'logo', 'bg_color', 'text_color']);
    }
    public $selected_agency;
    public $description;
    public $date;
    public $addAuditionModal;
    public function addAudition($id)
    {
        $this->reset(['selected_agency', 'description', 'date']);
        $this->selected_agency = Agency::find($id);
        $this->addAuditionModal = true;
    }
    public function saveAudition()
    {
        $this->selected_agency->auditions()->create([
            'description' => $this->description,
            'date' => $this->date,
        ]);
        $this->reset(['addAuditionModal', 'selected_agency', 'description', 'date']);
    }
    public function render()
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $auditions = Au::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)->with('agency')->paginate(12);
        return view('livewire.audition', [
            'agencies' => Agency::paginate(12),
            'auditions' => $auditions
        ]);
    }
}
