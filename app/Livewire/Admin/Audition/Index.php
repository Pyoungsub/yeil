<?php

namespace App\Livewire\Admin\Audition;

use Livewire\Component;

class Index extends Component
{
    public $addAgencyModal;
    public $name;
    public $logoPreview;
    public $logo;
    public $logo_path;
    public $bg_color;
    public $text_color;
    public $content = '';
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
    public function render()
    {
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $auditions = Audition::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)->with('agency')->paginate(12);
        //['auditions' => $auditions]
        return view('livewire.admin.audition.index');
    }
}
