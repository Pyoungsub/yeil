<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTuitionPhoto extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function lesson_tuition_photo_url()
    {
        return $this->hasOne(LessonTuitionPhotoUrl::class);
    }
}
