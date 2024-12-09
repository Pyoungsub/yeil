<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Lesson;
use App\Models\Purpose;
use App\Models\Curriculum;
use App\Models\PurposeYoutube;
use App\Models\PurposePeopleYoutube;
use App\Models\PurposeIdolVideo;
use App\Models\PurposePeopleVideo;
use App\Models\Group;
use App\Models\Part;
use App\Models\PartPhoto;
use App\Models\PartDescription;
class Purposes extends Component
{
    use WithFileUploads;

    public $is_admin;

    public $lesson;
    public $purpose;

    public $curriculumModal;
    public $selected_curriculum;
    public $title;
    public $sub_title;
    public $img_path;
    public $photo;
    public $photoPreview;

    public $youtubeModal;
    public $selected_youtube;
    public $link;

    public $banner_youtube_link;
    public $bannerYoutubeModal;
    public function modifyBannerYoutube()
    {
        $this->reset('banner_youtube_link');
        if($this->purpose->purpose_banner_youtube)
        {
            $this->banner_youtube_link = $this->purpose->purpose_banner_youtube->link;
        }
        $this->bannerYoutubeModal = true;
    }
    public $introduce;
    public $introduceModal;
    public function modifyIntroduce()
    {
        if($this->purpose->purpose_people_introduce)
        {
            $this->introduce = $this->purpose->purpose_people_introduce->title;
        }
        $this->introduceModal = true;
    }
    public function saveIntroduce()
    {
        $this->purpose->purpose_people_introduce()->updateOrCreate(
            ['purpose_id' => $this->purpose->id],
            ['title' => $this->introduce]
        );
        $this->reset(['introduceModal', 'introduce']);
    }
    
    public $selected_people;
    public $people_link;
    public $goal;
    public $people_name;
    public $peopleYoutubeModal;
    public function addPeopleYoutube()
    {
        $this->reset(['selected_people', 'people_link', 'goal', 'people_name']);
        $this->peopleYoutubeModal = true;
    }
    public function savePeople()
    {
        if($this->selected_people)
        {
            $this->selected_people->update([
                'link' => $this->people_link,
                'goal' => $this->goal,
                'name' => $this->people_name
            ]);
        }
        else
        {
            $this->purpose->purpose_people_youtubes()->create([
                'link' => $this->people_link,
                'goal' => $this->goal,
                'name' => $this->people_name
            ]);
        }
        $this->reset(['peopleYoutubeModal', 'selected_people', 'people_link', 'goal', 'people_name']);
    }
    public function modifyPeople($id)
    {
        $this->selected_people = PurposePeopleYoutube::find($id);
        $this->people_link = $this->selected_people->link;
        $this->goal = $this->selected_people->goal;
        $this->people_name = $this->selected_people->name;
        $this->peopleYoutubeModal = true;
    }
    public function deletePeople($id)
    {
        PurposePeopleYoutube::find($id)->delete();
    }

    public $selected_people_video;
    public $people_video;
    public $people_video_path;
    public $people_video_goal;
    public $people_video_name;
    public $peopleVideoModal;
    public function addPeopleVideo()
    {
        $this->reset(['selected_people_video', 'people_video_path', 'people_video_goal', 'people_video_name']);
        $this->peopleVideoModal = true;
    }
    public function modifyPeopleVideo($id)
    {
        $this->selected_people_video = PurposePeopleVideo::find($id);
        $this->people_video_path = $this->selected_people_video->video_path;
        $this->people_video_goal = $this->selected_people_video->goal;
        $this->people_video_name = $this->selected_people_video->name;
        $this->peopleVideoModal = true;
    }
    public function savePeopleVideo()
    {
        $video_path = $this->people_video->storePublicly('purposes', 'public');
        if($this->selected_people_video)
        {
            if($this->people_video_path)
            {
                Storage::disk('public')->delete($this->people_video_path);
            }
            
            $this->selected_people_video->update([
                'video_path' => $video_path,
                'goal' => $this->people_video_goal,
                'name' => $this->people_video_name
            ]);
        }
        else
        {
            $this->purpose->purpose_people_videos()->create([
                'video_path' => $video_path,
                'goal' => $this->people_video_goal,
                'name' => $this->people_video_name
            ]);
        }
        $this->reset(['peopleVideoModal', 'selected_people_video', 'people_video_path', 'people_video_goal', 'people_video_name']);
    }
    public function deletePeopleVideo($id)
    {
        $purpose_people_video = PurposePeopleVideo::find($id);
        Storage::disk('public')->delete($purpose_people_video->video_path);
        $purpose_people_video->delete();
    }

    public function saveYoutube()
    {
        
        if($this->purpose->purpose_banner_youtube)
        {
            $this->purpose->purpose_banner_youtube->update(['link' => $this->banner_youtube_link]);
        }
        else
        {
            $this->purpose->purpose_banner_youtube()->create([
                'link' => $this->banner_youtube_link
            ]);
        }
        $this->reset(['banner_youtube_link', 'bannerYoutubeModal']);
    }
    
    public function deletePart($id)
    {
        $selected_part = Part::find($id);
        if($selected_part->part_photo)
        {
            Storage::disk('public')->delete($selected_part->part_photo->img_path);
        }
        Part::find($id)->delete();
    }

    public $selected_part;
    public $description;
    public $descriptionModal;
    public function setDescription($id)
    {
        $this->reset('description');
        $this->selected_part = Part::find($id);
        $this->description = $this->selected_part->description;
        
        $this->descriptionModal = true;
    }
    public function saveDescription()
    {
        $this->selected_part->update(['description' => $this->description]);
        $this->reset(['descriptionModal', 'selected_part', 'description']);
    }
    public $partPhotoModal;
    public function addPartPhoto($id)
    {
        $this->reset(['photo', 'photoPreview']);
        $this->selected_part = Part::find($id);
        $this->partPhotoModal = true;
    }
    public function savePartPhoto()
    {
        if($this->selected_part->part_photo)
        {
            Storage::disk('public')->delete($this->selected_part->part_photo->img_path);
        }
        $path = $this->photo->storePublicly('part', 'public');
        $this->selected_part->part_photo()->updateOrCreate(
            ['part_id' => $this->selected_part->id],
            ['img_path' => $path]
        );
        $this->reset(['partPhotoModal', 'selected_part', 'photo', 'photoPreview']);
    }
    public function deletePartPhoto($id)
    {
        $selected_photo = PartPhoto::where('part_id', $id)->firstOrFail();
        Storage::disk('public')->delete($selected_photo->img_path);
        $selected_photo->delete();
    }
    public $selected_part_description;
    public $part_description;
    public $partDescriptionModal;
    public function addPartDescription($id)
    {
        $this->selected_part = Part::find($id);
        $this->partDescriptionModal = true;
    }
    public function savePartDescription()
    {
        if($this->selected_part)
        {
            $this->selected_part->part_descriptions()->firstOrCreate([
                'part_id' => $this->selected_part->id,
                'description' => $this->part_description
            ]);
        }
        else
        {
            $this->selected_part_description->update([
                'description' => $this->part_description
            ]);
        }
        $this->reset(['partDescriptionModal', 'selected_part_description', 'selected_part', 'part_description']);
    }    
    public function modifyPartDescription($id)
    {
        $this->selected_part_description = PartDescription::find($id);
        $this->part_description = $this->selected_part_description->description;
        $this->partDescriptionModal = true;
    }

    public function deletePartDescription($id)
    {
        PartDescription::find($id)->delete();
    }

    public function addCurriculum()
    {
        $this->reset(['selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
        $this->curriculumModal = true;
    }
    public function modify($id)
    {
        $this->reset(['selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
        $this->selected_curriculum = Curriculum::find($id);
        $this->title = $this->selected_curriculum->title;
        $this->sub_title = $this->selected_curriculum->sub_title;
        $this->img_path = $this->selected_curriculum->img_path;
        $this->curriculumModal = true;
    }
    public function deletePhoto()
    {
        Storage::disk('public')->delete($this->selected_curriculum->img_path);
        $this->reset('img_path');
    }
    public function save()
    {
        $this->validate([
            'title' => 'nullable|string|min:2',
            'sub_title' => 'nullable|string|min:2',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:102400'
        ]);
        if($this->selected_curriculum)
        {
            $curriculum = $this->selected_curriculum;
            $curriculum->update([
                'title' => $this->title,
                'sub_title' => $this->sub_title,
            ]);
        }
        else
        {
            $curriculum = $this->purpose->curricula()->create([
                'title' => $this->title,
                'sub_title' => $this->sub_title,
            ]);
        }
        if($this->photo)
        {
            if($curriculum->img_path)
            {
                Storage::disk('public')->delete($curriculum->img_path);
            }
            $path = $this->photo->storePublicly('curricula', 'public');
            $curriculum->update(['img_path' => $path]);
        }
        $this->reset(['curriculumModal', 'selected_curriculum', 'title', 'sub_title', 'img_path', 'photo', 'photoPreview']);
    }
    public function delete($id)
    {
        $curriculum = Curriculum::find($id);
        if($curriculum->img_path)
        {
            Storage::disk('public')->delete($curriculum->img_path);
        }
        $curriculum->delete();
    }
    public function addYoutube()
    {
        $this->reset(['link']);
        $this->youtubeModal = true;
    }
    public function saveLink()
    {
        if($this->selected_youtube)
        {
            $this->selected_youtube->update(['link' => $this->link]);
        }
        else
        {
            $this->purpose->purpose_youtubes()->create([
                'link' => $this->link
            ]);
        }
        $this->reset(['selected_youtube', 'link', 'youtubeModal']);
    }
    public function modifyYoutube($id)
    {
        $this->selected_youtube = PurposeYoutube::find($id);
        $this->link = $this->selected_youtube->link;
        $this->youtubeModal = true;
    }
    public function deleteYoutube($id)
    {
        PurposeYoutube::find($id)->delete();
    }

    public $selected_idol_video;
    public $idol_video;
    public $idol_video_path;
    public $idolVideoModal;
    public function addIdolVideo()
    {
        $this->reset(['selected_idol_video', 'idol_video', 'idol_video_path']);
        $this->idolVideoModal = true;
    }
    public function modifyIdolVideo($id)
    {
        $this->selected_idol_video = PurposeIdolVideo::find($id);
        $this->idol_video_path = $this->selected_idol_video->video_path;
        $this->idolVideoModal = true;
    }
    public function saveIdolVideo()
    {
        $video_path = $this->idol_video->storePublicly('purposes', 'public');
        if($this->selected_idol_video)
        {
            if($this->idol_video_path)
            {
                Storage::disk('public')->delete($this->idol_video_path);
            }
            $this->selected_idol_video->update([
                'video_path' => $video_path,
            ]);
        }
        else
        {
            $this->purpose->purpose_idol_videos()->create([
                'video_path' => $video_path,
            ]);
        }
        $this->reset(['idolVideoModal', 'selected_idol_video', 'idol_video_path']);
    }
    public function deleteIdolVideo($id)
    {
        $purpose_idol_video = PurposeIdolVideo::find($id);
        Storage::disk('public')->delete($purpose_idol_video->video_path);
        $purpose_idol_video->delete();
    }

    public function mount($lesson, $purpose)
    {
        $this->lesson = Lesson::where('lesson', $lesson)->first();
        $this->purpose = Purpose::where('purpose', $purpose)->first();
        if($this->lesson)
        {
            $this->purpose = $this->lesson->purposes()->where('purpose', $purpose)->first();
        }
        if(auth()->user() && auth()->user()->admin)
        {
            $this->is_admin = true;
        }
    }
    public function render()
    {
        $purpose_youtubes = $this->purpose->purpose_youtubes()->take(10)->get();
        $purpose_idol_videos = $this->purpose->purpose_idol_videos()->take(10)->get();
        return view('livewire.purposes', ['purpose_youtubes' => $purpose_youtubes, 'purpose_idol_videos' => $purpose_idol_videos]);
    }
}
