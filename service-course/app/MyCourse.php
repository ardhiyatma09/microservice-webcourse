<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class MyCourse extends Model
{
    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
