<?php

namespace App\Livewire\Admin\Audition;

use Livewire\Component;
use App\Models\Audition;
use App\Models\DisplayAudition;
use App\Models\Agency;
use Livewire\WithFileUploads;
class Index extends Component
{
    use WithFileUploads;
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
    public function deleteDisplay($id)
    {
        DisplayAudition::find($id)->delete();
        DisplayAudition::orderBy('order', 'asc')
        ->get()
        ->each(function ($item, $index) {
            $item->order = $index + 1;
            $item->save();
        });
    }
    public function render()
    {
        $agencies = Agency::paginate(12);
        $display_auditions = DisplayAudition::with('audition.agency')->orderBy('order')->get();
        $auditions = Audition::with('agency')->doesntHave('display_audition')->paginate(12);
        return view('livewire.admin.audition.index', ['agencies' => $agencies, 'display_auditions' => $display_auditions, 'auditions' =>$auditions]);
    }
}
