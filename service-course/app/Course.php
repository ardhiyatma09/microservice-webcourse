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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
    ]; //mengubah tampilan date time agar mudah di baca di return json

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
