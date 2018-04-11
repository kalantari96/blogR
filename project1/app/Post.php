<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded =[];



    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function mains()
    {
        return $this->belongsTo(main::class);
    }

    protected $fillable = [
        'desc',
        'user_id'
    ];


}
