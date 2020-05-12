<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChpDetail extends Model
{
    //
    public function Chp() 
    {
    	return $this->belongsTo('App\Chp');
    }

    public function product() {
    	return $this->belongsTo('App\Product');    
    }  
}
