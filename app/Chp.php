<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Chp extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function user() 
    {
    	return $this->belongsTo('App\User');    
    }

    public function product() {
        return $this->belongsTo('App\Product');    
    }  

    public function customer() 
    {
    	return $this->belongsTo('App\Customer');    
    }

    public function chpdetail() 
    {
        return $this->hasMany('App\ChpDetail');
    }


    public function getDeliveryAtAttribute($value)
    {
        return Carbon::parse($value, 'Asia/Ho_Chi_Minh');
    }
}
