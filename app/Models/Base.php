<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public function pattern(){
        return $this->belongsToMany("App\Models\Pattern");
    }
    public function patterns(){
        return $this->belongsTo("App\Models\Pattern",'pattern_id');
    }
    public function variation(){
        return $this->belongsToMany("App\Models\Variation");
    }
    public function variations(){
        return $this->belongsTo("App\Models\Variation",'variation_id','id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function group(){
    	return $this->belongsTo("App\Models\Group",'used_by');
    }

    public function layouts(){
        return $this->belongsToMany("App\Models\Layout",'base_layout','base_id','layout_id');
    }
    public function users(){
        return $this->belongsTo("App\Models\User","user_id");
    }
    public function version(){
        return $this->belongsTo("App\Models\Version");
    }
    public function type(){
        return $this->belongsTo("App\Models\Type");
    }
}
