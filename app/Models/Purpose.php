<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }
    public function purpose_youtubes()
    {
        return $this->hasMany(PurposeYoutube::class);
    }
    public function additional_subjects()
    {
        return $this->hasMany(AdditionalSubject::class);
    }
    public function purpose_photo()
    {
        return $this->hasOne(PurposePhoto::class);
    }
    public function purpose_banner_youtube()
    {
        return $this->hasOne(PurposeBannerYoutube::class);
    }
    public function purpose_idol_youtubes()
    {
        return $this->hasMany(PurposeIdolYoutube::class);
    }
}
