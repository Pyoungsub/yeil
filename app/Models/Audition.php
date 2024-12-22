<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function display_audition()
    {
        return $this->hasOne(DisplayAudition::class);
    }
}
