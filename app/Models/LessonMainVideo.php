<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonMainVideo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
