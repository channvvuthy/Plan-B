<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public function bases(){
        return $this->hasMany("App\Models\Bases","version_id");
    }
}
