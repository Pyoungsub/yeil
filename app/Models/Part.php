<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function part_photo()
    {
        return $this->hasOne(PartPhoto::class);
    }
    public function describe()
    {
        return $this->hasOne(Description::class);
    }
    public function part_curricula()
    {
        return $this->hasMany(PartCurricula::class);
    }
    public function part_descriptions()
    {
        return $this->hasMany(PartDescription::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public function scopeOrderByDayAndFrom()
    {
        return $this->schedules()->orderBy('day_id', 'asc')
        ->orderBy('from', 'asc');
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
