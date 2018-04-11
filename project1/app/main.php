<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class main extends Model
{
    protected $guarded =[];


    public function posts()
    {
        return $this->hasMany(Post::class,'main-id','id');
    }




}
