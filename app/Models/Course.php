<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code',
        'course_name',
        'description',
        'stream',
        'lecturer_id',
    ];

    /**
     * Get the lecturer that teaches the course.
     */
    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
