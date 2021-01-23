<?php

namespace App;

use App\Lesson;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $guarded = [];

    public function lessons() {
        return $this->hasMany(Lesson::class)->orderBy('id','asc');
    }
}
