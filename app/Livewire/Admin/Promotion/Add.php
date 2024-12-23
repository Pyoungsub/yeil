<?php

namespace App\Livewire\Admin\Promotion;

use Livewire\Component;
use App\Models\Promotion;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads, WithPagination, WithoutUrlPagination;
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
        Promotion::create([
            'title' => $this->title,
            'content' => $this->content,
            'img_path' => $this->img_path,
            'thumbnail_path' => $this->thumbnail_path
        ]);
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
                $thumbnailPath = "promotions/{$yymmFolder}/thumbnails/" . $filename;
                // 3. Move the file from tmp to the images folder
                if (Storage::disk('public')->exists('tmp/' . $filename)) {
                    if($firstImageProcessed == false)
                    {
                        Storage::disk('public')->makeDirectory("promotions/{$yymmFolder}/thumbnails");
                        $manager = new ImageManager(Driver::class);
                        $thumbnail = $manager->read('storage/tmp/' . $filename);
                        $thumbnail = $thumbnail->scaleDown(width:300);
                        $thumbnail->save('storage/'.$thumbnailPath);
                        $this->thumbnail_path = $thumbnailPath;
                        $this->img_path = $newPath;
                        $firstImageProcessed = true;
                    }
                    
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
    public function render()
    {
        return view('livewire.admin.promotion.add');
    }
}
