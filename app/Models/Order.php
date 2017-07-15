<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id',
        'category',
        'keyword'	,
        'top_page',
        'sub_page',
        'dateline',
        'base_name',
        'layout'	,
        'member_id',
        'member_name',
        'leader_check_result',
        'leader_check_description',
        'qc_check_name',
        'qc_check_result'	,
        'qc_check_description',
        'qc_second_check_name',
        'qc_second_check_result',
        'qc_second_check_description',
        'date_upload',
        'upload_status',
        'group_name',
        'old_url',
        'status'];
    public function  user(){
        return $this->belongsTo("App\Models\User",'member_id',"");
    }
    public function group(){
        return $this->belongsTo("App\Group","group_id","id");
    }
}
