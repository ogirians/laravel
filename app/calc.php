<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calc extends Model
{
		protected $table = 'calc';
		
    	protected $fillable = [
		'name', 'pdate', 'total','position', 'location' ,
	];
}
