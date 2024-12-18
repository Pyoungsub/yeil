<?php

namespace App\Livewire\Admin\Audition;

use Livewire\Component;

use App\Models\Agency;
use App\Models\Audition;
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
    public $agencies;
    public $selected_id;
    public $description;
    public $date;
    public $content;
    public function saveAudition()
    {
        $validated = $this->validate([ 
            'selected_id' => 'required',
            'description' => 'required|min:3',
            'date' => 'required',
            'content' => 'required|min:3',
        ]);
        $this->content = $this->moveImageAndUpdateContent($this->content);
        $agency = Agency::find($this->selected_id);

        $create_audition = $agency->auditions()->create([
            'description' => $this->description,
            'date' => $this->date,
        ]);
        if($create_audition)
        {
            $create_audition->audition_content()->create([
                'content' => $this->content
            ]);
        }
        $this->reset(['selected_id', 'description', 'date', 'content']);
        return redirect()->route('home');
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
                        $firstImageProcessed = true;
                    }
                    $this->img_path = $newPath;
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
    public function mount()
    {
        $this->agencies = Agency::all();
    }
    public function render()
    {
        return view('livewire.admin.audition.add');
    }
}
