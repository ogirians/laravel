<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    //
	protected $fillable = [
	'name', 'salary', 'start_day', 'birth','nik','status','agama','gender', 'address1', 'address2', 'phone','phone_fam', 'photo', 'job', 'idnum',
	'location','humans_status','humans_level'];

	public function salary()
	{
		return $this->hasOne('App\Salary');
	}

	public function humanId()
	{
		return $this->id;
	}

}
