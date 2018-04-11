<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //use \Conner\Tagging\Taggable;

    protected $guarded =[];



    public function category()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
