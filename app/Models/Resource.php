<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['title', 'file', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
