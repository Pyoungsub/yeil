<?php

namespace App\Livewire\Admin\Promotion;

use Livewire\Component;

use App\Models\Promotion;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Modify extends Component
{
    public $promotion;
    public $title;
    public $content;
    public $img_path;
    public $thumbnail_path;
    public function savePromotion()
    {
        $validated = $this->validate([ 
            'title' => 'required|min:3',
            'content' => 'required|min:3',
        ]);
        $this->content = $this->moveImageAndUpdateContent($this->content);
        $updateData = [
            'title' => $this->title,
            'content' => $this->content,
        ];
        $this->promotion->update($updateData);
        $this->reset(['title', 'content', 'img_path', 'thumbnail_path']);
        return redirect()->route('admin.promotion');
    }
    public function moveImageAndUpdateContent($content)
    {
        $yymmFolder = Carbon::now()->format('ym');
        // 1. Extract the image paths from the content using regex
        //preg_match_all('/<img src="([^"]+)"/i', $content, $matches);
        //preg_match_all('/<img src="([^"]+\.(gif|jp[e]?g|png|bmp))"/i', $content, $matches);
        preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
        if (!empty($matches[1])) {
            $firstImageProcessed = false;
            foreach ($matches[1] as $imagePath) {
                // 2. Get the image file name
                $filename = basename($imagePath);
                // Define paths with `yymm` structure
                $newPath = "promotions/{$yymmFolder}/" . $filename;
                // 3. Move the file from tmp to the images folder
                if (Storage::disk('public')->exists('tmp/' . $filename)) {                    
                    // Move the original image
                    Storage::disk('public')->move('tmp/' . $filename, $newPath);
                }

                // 4. Replace the old path with the new path in the content
                $content = str_replace($imagePath, Storage::url($newPath), $content);
            }
        }

        // 5. Return or save the updated content
        return $content;
    }
    public function mount($id)
    {
        $this->promotion = Promotion::find($id);
        $this->title = $this->promotion->title;
        $this->content = $this->promotion->content;
    }
    public function render()
    {
        return view('livewire.admin.promotion.modify');
    }
}
