<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
