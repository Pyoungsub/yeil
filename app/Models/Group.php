<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
    public function parts()
    {
        return $this->hasMany(Part::class);
    }
    public function additional_parts()
    {
        return $this->hasMany(AdditionalPart::class);
    }
}
