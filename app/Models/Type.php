<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function bases(){
        return $this->hasMany("App\Modles\Bases",'type_id');
    }
}
