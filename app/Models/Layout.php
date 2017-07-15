<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    public function bases(){
    	return $this->belongsToMany("App\Models\Base",'base_layout','layout_id','base_id');
    }
}
