<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    public  function variation(){
        return $this->belongsTo('App\Models\Variation');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User','user_patterns');
    }

    public function  bases(){
        return $this->hasMany("App\Models\Base");
    }
}
