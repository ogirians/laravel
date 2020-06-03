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

class BownerHumansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $humans = Human::where('humans_Status', 1)->get();

        return view('bowner.humans.index', compact('humans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $location = Human::select('location')->groupBy('location')->get();

		return view('bowner.humans.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HumanRequest $request)
    {
        //
		$input = $request->all();
        $role = $request->role;
        $location = $request->outlet;
        

        $input['start_day'] = date("Y-m-d", strtotime($input['start_day']));
		$input['birth'] = date("Y-m-d", strtotime($input['birth']));

		  if($request->file('photo')){
			$file = $request->file('photo');
			$name = time() . $file->getClientOriginalName();
			$file->move('images', $name);
			$input['photo'] = $name;
          }
          else {
            $input['photo'] = 'person-flat.png';
		  } 

        $human = Human::create($input);
        
        // Create salary for new employee
        //Salary::create(['human_id' => $human->id]);
        //Leave::create(['human_id' => $human->id]);

        Session::flash('created_message', 'The employee has been added');

		 if ($role == 6 ) {
        return redirect('HRD/humans');
        }
        else {
        return redirect('outlet/humans/'.$location);    
        }
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($location)
    {
         
            $humans = DB::table('humans')
            ->where('location',$location)
            ->where('humans_Status', 1)
            ->get();
       

        return view('bowner.humans.index', compact('humans'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$human = Human::findOrFail($id);
		$day = date("d-m-Y", strtotime($human->start_day));
        $day_birth = date("d-m-Y", strtotime($human->birth));

        $location = Human::select('location')->groupBy('location')->get();

        $nilai = DB::Table('humans')
                ->join('calc','humans.id','=','calc.humans_id')
                ->select('humans.name','calc.total','calc.pdate','calc.no','humans.id')
                ->where('humans.id', $id)
                ->get();
		
		return view('bowner.humans.edit', compact('human', 'day', 'day_birth','nilai','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(request $request, $id)
    {
        //
		$human = Human::findOrFail($id);
		$input = $request->all();
        $role = $request->role;
        $location = $request->outlet;

		$input['start_day'] = date("Y-m-d", strtotime($input['start_day']));
        $input['birth'] = date("Y-m-d", strtotime($input['birth']));
		
		if($file = $request->file('photo')){
			$name = time() . $file->getClientOriginalName();
			$file->move('images', $name);
			$input['photo'] = $name;
		}
		
		$human->update($input);

        Session::flash('updated_message', 'The employee has been updated');
		
        if ($role == 6 ) {
		return redirect('HRD/humans');
        }
        else {
        return redirect('outlet/humans/'.$location);    
        }

    }   



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$human = Human::findOrFail($id);
		if($human->photo){
			unlink(public_path('images/') . $human->photo);
		}
		//unlink(public_path() . $human->photo);
		$human->delete();
		
		Session::flash('deleted_message', 'The user has been deleted');

        return redirect('HRD/humans');
        
    }


     
    public function resign(request $request)
    {   


        $start = DB::Table('humans')
        ->select('start_day')
        ->where('id', $request->id)
        ->first();

        $end = $request->waktu;

 
        $datetime1 = new DateTime($start->start_day);
        $datetime2 = new DateTime($end);
        $interval = $datetime1->diff($datetime2);
        //$interval->format('%Y-%m-%d %H:%i:%s');
       
        leave::create([
            'human_id' => $request->id,
            'leave_date' => $end,
            'days' =>  $interval->format('%D days, %m months, %Y years'),          
        ]);

        Human::where('id',$request->id)
            ->update(['humans_Status' => 0]);


        Session::flash('deleted_message', 'The employee was resigned');

        return redirect('HRD/humans');
        
    }

    //public function print()
    //{  
      //  $humans = DB::table('humans')->get();
       
        //$pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('bowner.humans.print',['humans'=>$humans]);
        //return $pdf->download('karyawan-pdf');

    //}

    public function print()
    {
        
        $humans = DB::table('humans')->get();
        
        //view()->share('humans',$humans);

        //if($request->has('download')){
            // Set extra option
            //PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
            $pdf = PDF::loadView('bowner.humans.print',['humans'=>$humans]);
            // download pdf
            return $pdf->download('karyawan.pdf');
        //}
        //return view('index');
    }

}
