<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    public  function pattern(){
        return $this->hasMany("App\Models\Pattern");
    }

    public function bases(){
        return $this->hasMany("App\Models\Base");
    }
}
