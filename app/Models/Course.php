<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable=['id','title','icon', 'category_id','description','weeks','days','videos'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   // protected $fillable=['type','icon'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    
}
