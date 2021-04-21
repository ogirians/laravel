<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


use App\Http\Requests\HumanRequest;
use App\Salary;
use App\Human;
use App\Leave;
use App\Hques;
use DB;
use Carbon\Carbon;
use DateTime;
use PDF;
use App\User;

class APIrecruitmentController extends Controller
{
    //
     public function store(Request $request)
    {
        
		$input = $request->all();

                
        $input['start_day'] = date("Y-m-d", strtotime($input['start_day']));
		$input['birth'] = date("Y-m-d", strtotime($input['birth']));
		
		$lahir = date("y", strtotime($input['birth']));
		$mulai = date("ym", strtotime($input['start_day']));
		$urutan = DB::table('humans')
                        ->max('id');
        
        $nik = $urutan + 1;
        $nik0= str_pad($nik, 5, '0', STR_PAD_LEFT);
        $input['nik']="$lahir$mulai$nik0";
        
        $pic = $input['photo'];
        $file = $pic;
		$name = time() . $file->getClientOriginalName();
		$file->move('images', $name);
		$input['photo'] = $name;
        
        /*if ($request->hasfile('photo')) {
			$file = $pic;
			$name = time() . $file->getClientOriginalName();
			$file->move('images', $name);
			$input['photo'] = $name;
          }
          else {
            if ($request -> gender == 'Perempuan') {
            $input['photo'] = 'person-girl-flat.png';
            }
            else {
            $input['photo'] = 'person-flat.png';
            }
                
         }	*/	   
        
        $input['humans_status'] = 1;
        $human = Human::create($input);
        
        Session::flash('created_message', 'The employee has been added');
          
        return response()->json([
            'status' => 'ok',
            'message' => 'pelamar telah di push'
        ], 200);

    }
}
