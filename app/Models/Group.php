<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /*
     * Group has many user
     */
    public function users(){
        return $this->hasMany("App\Models\User");
    }

    public function bases(){
    	return $this->hasMany("App\Models\Base");
    }
}
