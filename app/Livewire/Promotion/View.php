<?php

namespace App\Livewire\Promotion;

use Livewire\Component;
use App\Models\Promotion;

use Illuminate\Support\Facades\Storage;

class View extends Component
{
    public $promotion;

    public function delete()
    {
        $array = [];
        if($this->promotion->img_path)
        {
            $array[] = $this->promotion->img_path;
        }
        if($this->promotion->thumbnail_path)
        {
            $array[] = $this->promotion->thumbnail_path;
        }
        if(count($array)>0)
        {
            Storage::delete($array);
        }
        $this->deleteImages($this->promotion->content);
        $this->promotion->delete();
        return redirect()->route('promotion.lists');
    }
    public function deleteImages($content)
    {
        preg_match_all('/src="\/storage\/([^"]+)"/i', $content, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $imagePath) {
                Storage::delete($imagePath);
            }
        }
    }
    public function mount($id)
    {
        $this->promotion = Promotion::find($id);
    }
    public function render()
    {
        return view('livewire.promotion.view', ['promotion' => $this->promotion]);
    }
}
