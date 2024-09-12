<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'day',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function lecturer()
    {
        return $this->hasOne(Lecturer::class);
    }
    
}
