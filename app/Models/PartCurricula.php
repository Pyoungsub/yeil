<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartCurricula extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
