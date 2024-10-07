<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurposeIdolYoutube extends Model
{
    use HasFactory;
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
}
