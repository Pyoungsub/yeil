<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurposePeopleIntroduce extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
}
