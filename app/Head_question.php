<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head_question extends Model
{
    protected $table = "hques";
    protected $attribute = [
    	'knowledge' =>0,
    	'wspeed' =>0,
    	'wsoul' =>0,
    	'wqual' => 0,
    	'wpress' => 0,
    	'teamwork' =>0,
    	'communicate' => 0,
    	'responbility' => 0,
    	'learning' => 0,
    	'dicipline' => 0,
    	'initiative' => 0,
    	'creativity' => 0,
    	'honestly' => 0,
    	'obedience' => 0,
    	'loyalty' => 0,
    	'organate' => 0,
    	'coaching' => 0,
    	'controling' => 0,
    	'planing' => 0,
    	'delegate' => 0
        ];
    
    
	//protected $fillable = [
	//	'name', 'salary', 'start_day', 'birth', 'gender', 'address1', 'address2', 'phone', 'photo', 'job', 'idnum'
	

	//public function Head_question()
	//{
		//return $this->hasOne('App\Humans');
	//}

	//public function Head_question()
	//{
		//return $this->id;
	//}

}


