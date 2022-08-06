<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable=['id','title', 'course_id','description','weeks','icon','videos','days'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function images(){

        return $this->hasMany(Image::class);
    }
}
