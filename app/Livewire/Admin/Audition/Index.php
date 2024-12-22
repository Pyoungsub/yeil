<?php

namespace App\Livewire\Admin\Audition;

use Livewire\Component;
use App\Models\Audition;
use App\Models\DisplayAudition;

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
    public function display($id)
    {
        $tasks = DisplayAudition::orderBy('order')->get();
        foreach ($tasks as $index => $task) {
            $task->update(['order' => $index + 2]); // Start from 2 to leave space for the new row
        }
        $task = DisplayAudition::firstOrCreate([
            'audition_id' => $id,
            'order' => 1
        ]);
    }
    public function render()
    {
        $display_auditions = DisplayAudition::with('audition.agency')->orderBy('order')->get();
        $auditions = Audition::with('agency')->doesntHave('display_audition')->paginate(12);
        return view('livewire.admin.audition.index', ['display_auditions' => $display_auditions, 'auditions' =>$auditions]);
    }
}
