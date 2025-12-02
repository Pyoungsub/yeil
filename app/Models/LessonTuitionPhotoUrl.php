<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTuitionPhotoUrl extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lesson_tuition_photo()
    {
        return $this->belongsTo(LessonTuitionPhoto::class);
    }
}
