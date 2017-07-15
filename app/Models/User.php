<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*
     * User has many roles
     */
    public function roles(){
        return $this->belongsToMany('\App\Models\Role','role_user','user_id','role_id');
    }

    /*
     * user has many group
     */
    public function group(){
        return $this->belongsTo("App\Models\Group");
    }
    public function patterns(){
        return $this->belongsToMany('App\Models\Pattern','user_patterns');
    }
    public function path(){
        return $this->hasOne('App\Models\Path');
    }
    public function bases(){
        return $this->hasMany('App\Models\Base');
    }
}
