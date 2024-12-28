<?php

namespace App\Livewire\Admin\Audition;

use Livewire\Component;

use App\Models\Agency;
use App\Models\Audition;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Modify extends Component
{
    public $audition;
    public $agencies;
    public $selected_id;
    public $description;
    public $date;
    public $content;
    public $img_path;
    public $thumbnail_path;
    public function saveAudition()
    {
        $validated = $this->validate([ 
            'selected_id' => 'required',
            'description' => 'required|min:3',
            'date' => 'required',
            'content' => 'required|min:3',
        ]);
        $this->content = $this->moveImageAndUpdateContent($this->content);
        $updateData = [
            'description' => $this->description,
            'date' => $this->date,
            'content' => $this->content,
        ];
        
        if ($this->img_path) {
            $updateData['img_path'] = $this->img_path;
        }
        
        if ($this->thumbnail_path) {
            $updateData['thumbnail_path'] = $this->thumbnail_path;
        }
        $this->audition->update($updateData);
        $this->reset(['selected_id', 'description', 'date', 'content', 'img_path', 'thumbnail_path']);
        return redirect()->route('admin.audition');
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
                $newPath = "auditions/{$yymmFolder}/" . $filename;
                $thumbnailPath = "auditions/{$yymmFolder}/thumbnails/" . $filename;
                // 3. Move the file from tmp to the images folder
                if (Storage::disk('public')->exists('tmp/' . $filename)) {
                    if($firstImageProcessed == false)
                    {
                        Storage::disk('public')->makeDirectory("auditions/{$yymmFolder}/thumbnails");
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
    public function mount($id)
    {
        $this->agencies = Agency::all();
        $this->audition = Audition::find($id);
        $this->selected_id = $this->audition->agency_id;
        $this->description = $this->audition->description;
        $this->date = $this->audition->date;
        $this->content = $this->audition->content;
    }
    public function render()
    {
        return view('livewire.admin.audition.modify');
    }
}
