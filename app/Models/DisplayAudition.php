<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayAudition extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function audition()
    {
        return $this->belongsTo(Audition::class);
    }
}
