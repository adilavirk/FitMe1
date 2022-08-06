<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=[

        'image',
        'content_id',
    ];
   public function content(){

       return $this->belongsTo(Content::class);
   }
}
