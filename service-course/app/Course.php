<?php

namespace App;

use App\Mentor;
use App\Chapter;
use App\ImageCourse;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name','certificate','tumbnail','type','status','price','level','description','mentor_id'
    ];

    public function mentor() {
        return $this->belongsTo(Mentor::class);
    }

    public function chapters() {
        return $this->hasMany(Chapter::class)->orderBy('id','asc');
    }

    public function images() {
        return $this->hasMany(ImageCourse::class)->orderBy('id','desc');
    }
}
