<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
use App\calc;
use App\Human;
use Carbon\Carbon;

class CalculatorController extends Controller
{
    public function choice($location = null){
        $e = "kepala";
        //$karyawan = calc::select('name')->distinct()->get();
        //$date = $users->addSelect('pdate')->get();
        if ($location != null) {


            $karyawan3 = DB::table('humans')
                    ->leftjoin('calc','humans.id','=','calc.humans_id')
                    ->select('humans.id','humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('ROUND(AVG(calc.total),1) as skore'),'humans.job','humans.location','humans_level')
                    ->groupBy('humans.id','humans.name','humans.job','humans.location','humans_level')
                    ->where('humans.location',$location)
                    ->where('humans.job','not like',"%".$e."%")
                    ->where('humans.humans_status','1')
                    ->get();
        }

        else {

                $karyawan3 = DB::table('humans')
                      ->leftjoin('calc','humans.id','=','calc.humans_id')
                      ->select('humans.id','humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('ROUND(AVG(calc.total),1) as skore'),'humans.job','humans.location','humans_level')
                      ->groupBy('humans.id','humans.name','humans.job','humans.location','humans_level')
                      ->where('humans.humans_status','1')
                      ->get();
               
        }

        $now = Carbon::now()->format('M');


        return view('calculator.choice', array(
        'karyawan3' => $karyawan3,
        'now' => $now,   
        ));
}


    ///////////////INPUT CONTROLLER/////////////////////////////////


     public function inputdriver($location, $id = null){

        $human = DB::table('humans')
        ->select('id','name','job','location')
        ->where('id',$id)
        ->get();

        return view('calculator.driverinput', ['human'=>$human]);

    }

    public function inputstaff($location, $id = null){
    
        $human = DB::table('humans')
        ->select('id','name','job','location')
        ->where('id',$id)
        ->get();
    
     
        //return view('calculator.staffinput', ['human'=>$human]);
         return view('calculator.staffinput', array(
        'human' => $human,
        ));
    }


    public function inputhead($location, $id = null){
    
        $human = DB::table('humans')
        ->select('id','name','job','location') 
        ->where('id',$id)
        ->get();
    
     
        //return view('calculator.staffinput', ['human'=>$human]);
         return view('calculator.headinput', array(
        'human' => $human,
        ));
    }


    


    

    ///////////////STORE CONTROLLER/////////////////////////////////


    public function calculator(request $request){
        $a = 10;
        $b = 100;

        $role = $request->user;
        $location = $request->location;
        $inhuman = $request->id;     

        $knowledge = $request->knowledge;
        $hasil1 = $knowledge*5/$b;
        $wspeed = $request->wspeed;
        $hasil2 = $wspeed*5/$b;
        $wsoul = $request->wsoul;
        $hasil3 = $wsoul*5/$b;
        $wqual = $request->wqual;
        $hasil4 = $wqual*5/$b;
        $wpress = $request->wpress;
        $hasil5 = $wpress*5/$b;
        $teamwork = $request->teamwork;
        $hasil6 = $teamwork*5/$b;
        $communicate = $request->communicate;
        $hasil7 = $communicate*5/$b;
        $responbility = $request->responbility;
        $hasil8 = $responbility*5/$b;
        $learning = $request->learning;
        $hasil9 = $learning*5/$b;
        $dicipline = $request->dicipline;
        $hasil10 = $dicipline*5/$b;
        $initiative = $request->initiative;
        $hasil11 = $initiative*5/$b;
        $creativity = $request->creativity;
        $hasil12 = $creativity*5/$b;
        $honestly = $request->honestly;
        $hasil13 = $honestly*5/$b;
        $obedience = $request->obedience;
        $hasil14 = $obedience*5/$b;
        $loyalty = $request->loyalty;
        $hasil15 = $loyalty*5/$b;
        $organate = $request->organate;
        $hasil16 = $organate*5/$b;
        $coaching = $request->coaching;
        $hasil17 = $coaching*5/$b;
        $controling = $request->controling;
        $hasil18 = $controling*5/$b;
        $planing = $request->planing;
        $hasil19 = $planing*5/$b;
        $delegate = $request->delegate;
        $hasil20 = $delegate*5/$b;
        $hasil21 = $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15+$hasil16+$hasil17+$hasil18+$hasil19+$hasil20;
        $total =number_format($hasil21, 2);
        $calc = DB::table('calc')->insert([
            'humans_id'=> $inhuman,
            'position'=>$request->position,
            'location'=>$location   ,
            'pdate'=>$request->pdate,
            'knowledge'=> $hasil1,
            'wspeed'=> $hasil2,
            'wsoul'=> $hasil3,
            'wqual'=> $hasil4,
            'wpress'=> $hasil5,
            'teamwork'=> $hasil6,
            'communicate'=> $hasil7,
            'responbility'=> $hasil8,
            'learning' => $hasil9,
            'dicipline' => $hasil10,
            'initiative' => $hasil11,
            'creativity' => $hasil12,
            'honestly' => $hasil13,
            'obedience' =>$hasil14,
            'loyalty' => $hasil15,
            'organate' => $hasil16,
            'coaching' => $hasil17,
            'controling' => $hasil18,
            'planing' => $hasil19,
            'delegate' => $hasil20,
            'total' => $total,
        ]);

        Session::flash('created_message', 'The score has been added');
   
        if ($role == '3'){
            return redirect('calculator/choice'); 
        }

        else {
            return redirect('outlet/choice/'.$location);       
        }
       
    }

   

     public function calculatordriver(request $request){
        $a = 10;
        $b = 100;
      
        $role = $request->user;
        $location = $request->location;

        $inhuman = $request->id;     

        $knowledge = $request->knowledge;
        $hasil1 = $knowledge*15/$b; 
        $wqual = $request->wqual;
        $hasil4 = $wqual*5/$b;
        $teamwork = $request->teamwork;
        $hasil6 = $teamwork*15/$b;
        $communicate = $request->communicate;
        $hasil7 = $communicate*10/$b;
        $dicipline = $request->dicipline;
        $hasil10 = $dicipline*10/$b;
        $initiative = $request->initiative;
        $hasil11 = $initiative*5/$b;
        $creativity = $request->creativity;
        $hasil12 = $creativity*10/$b;        
        $honestly = $request->honestly;
        $hasil13 = $honestly*10/$b;
        $obedience = $request->obedience;
        $hasil14 = $obedience*15/$b;
        $loyalty = $request->loyalty;
        $hasil15 = $loyalty*5/$b;
        
        $hasil21 = $hasil1+$hasil4+$hasil6+$hasil7+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15;
        $total =number_format($hasil21, 2);

        $calc = DB::table('calc')->insert([
            'humans_id'=> $inhuman,
            'position'=>$request->position,
            'location'=>$request->location,
            'pdate'=>$request->pdate,
            'knowledge'=> $hasil1,
            'wqual'=> $hasil4,
            'teamwork'=> $hasil6,
            'communicate'=> $hasil7,
            'dicipline' => $hasil10,
            'initiative' => $hasil11,
            'creativity' => $hasil12,
            'honestly' => $hasil13,
            'obedience' =>$hasil14,
            'loyalty' => $hasil15,
            'total' => $total,
        ]);

        Session::flash('created_message', 'The score has been added');

        if ($role == '3'){
            return redirect('calculator/choice'); 
        }

        else {
            return redirect('outlet/choice/'.$location);       
        }

    }



    public function calculatorstaff(request $request){
        $a = 10;
        $b = 100;
        
        $role = $request->user;
        $location = $request->location;
        $inhuman = $request->id;        

        $knowledge = $request->knowledge;
        $hasil1 = $knowledge*15/$b;
        $wspeed = $request->wspeed;
        $hasil2 = $wspeed*10/$b;
        $wsoul = $request->wsoul;
        $hasil3 = $wsoul*10/$b; 
        $wqual = $request->wqual;
        $hasil4 = $wqual*10/$b;
        $wpress = $request->wpress;
        $hasil5 = $wpress*5/$b;
        $teamwork = $request->teamwork;
        $hasil6 = $teamwork*5/$b;
        $communicate = $request->communicate;
        $hasil7 = $communicate*5/$b;
        $responbility = $request->responbility;
        $hasil8 = $responbility*5/$b;
        $learning = $request->learning;
        $hasil9 = $learning*5/$b;
        $dicipline = $request->dicipline;
        $hasil10 = $dicipline*5/$b;
        $initiative = $request->initiative;
        $hasil11 = $initiative*5/$b;   
        $creativity = $request->creativity;
        $hasil12 = $creativity*5/$b;     
        $honestly = $request->honestly;
        $hasil13 = $honestly*5/$b;
        $obedience = $request->obedience;
        $hasil14 = $obedience*5/$b;
        $loyalty = $request->loyalty;
        $hasil15 = $loyalty*5/$b;
        $hasil21 = $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15;
        $total =number_format($hasil21, 2);
        $calc = DB::table('calc')->insert([
            'humans_id'=> $inhuman,
            'position'=>$request->position,
            'location'=>$request->location,
            'pdate'=>$request->pdate,
            'knowledge'=> $hasil1,
            'wspeed'=> $hasil2,
            'wsoul'=> $hasil3,
            'wqual'=> $hasil4,
            'wpress'=> $hasil5,
            'teamwork'=> $hasil6,
            'communicate'=> $hasil7,
            'responbility'=> $hasil8,
            'learning' => $hasil9,
            'dicipline' => $hasil10,
            'initiative' => $hasil11,
            'creativity' => $hasil12,
            'honestly' => $hasil13,
            'obedience' =>$hasil14,
            'loyalty' => $hasil15,
            'total' => $total,
        ]);

        Session::flash('created_message', 'The score has been added');

        if ($role == '3'){
            return redirect('calculator/choice'); 
        }

        else {
            return redirect('outlet/choice/'.$location);       
        }
       
    }



    ///////////////UPDATE CONTROLER/////////////////////////////////


     public function edithead($id) {

         $now = Carbon::now()->format('m');

         $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

            //return view('calculator.staffinput', ['human'=>$human]);
             return view('calculator.edithead', array(
            'human' => $human,
           // 'job' => $job,
            'now' => $now
            ));
    }

    public function updhead(request $request, $id) {
        $a = 10;
        $b = 100;
        $name = $request->name;
        $role = $request->user;
        $location = $request->location;

        $knowledge = $request->knowledge;
        $hasil1 = $knowledge*5/$b;
        $wspeed = $request->wspeed;
        $hasil2 = $wspeed*5/$b;
        $wsoul = $request->wsoul;
        $hasil3 = $wsoul*5/$b;
        $wqual = $request->wqual;
        $hasil4 = $wqual*5/$b;
        $wpress = $request->wpress;
        $hasil5 = $wpress*5/$b;
        $teamwork = $request->teamwork;
        $hasil6 = $teamwork*5/$b;
        $communicate = $request->communicate;
        $hasil7 = $communicate*5/$b;
        $responbility = $request->responbility;
        $hasil8 = $responbility*5/$b;
        $learning = $request->learning;
        $hasil9 = $learning*5/$b;
        $dicipline = $request->dicipline;
        $hasil10 = $dicipline*5/$b;
        $initiative = $request->initiative;
        $hasil11 = $initiative*5/$b;
        $creativity = $request->creativity;
        $hasil12 = $creativity*5/$b;
        $honestly = $request->honestly;
        $hasil13 = $honestly*5/$b;
        $obedience = $request->obedience;
        $hasil14 = $obedience*5/$b;
        $loyalty = $request->loyalty;
        $hasil15 = $loyalty*5/$b;
        $organate = $request->organate;
        $hasil16 = $organate*5/$b;
        $coaching = $request->coaching;
        $hasil17 = $coaching*5/$b;
        $controling = $request->controling;
        $hasil18 = $controling*5/$b;
        $planing = $request->planing;
        $hasil19 = $planing*5/$b;
        $delegate = $request->delegate;
        $hasil20 = $delegate*5/$b;
        $hasil21 = $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15+$hasil16+$hasil17+$hasil18+$hasil19+$hasil20;
        $total =number_format($hasil21, 2);
        $calc = DB::table('calc')
            ->where('humans_id',$id)
            ->update([

            'knowledge'=> $hasil1,
            'wspeed'=> $hasil2,
            'wsoul'=> $hasil3,
            'wqual'=> $hasil4,
            'wpress'=> $hasil5,
            'teamwork'=> $hasil6,
            'communicate'=> $hasil7,
            'responbility'=> $hasil8,
            'learning' => $hasil9,
            'dicipline' => $hasil10,
            'initiative' => $hasil11,
            'creativity' => $hasil12,
            'honestly' => $hasil13,
            'obedience' =>$hasil14,
            'loyalty' => $hasil15,
            'organate' => $hasil16,
            'coaching' => $hasil17,
            'controling' => $hasil18,
            'planing' => $hasil19,
            'delegate' => $hasil20,
            'total' => $total,
        ]);

            if ($role == '3'){
                return redirect('calculator/choice'); 
            }

            else {
                return redirect('outlet/choice/'.$location);       
            }

    }


     public function updatestaff($id) {

         $now = Carbon::now()->format('m');

         $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

            //return view('calculator.staffinput', ['human'=>$human]);
             return view('calculator.editstaff', array(
            'human' => $human,
           // 'job' => $job,
            'now' => $now
            ));
    }

    public function updstaff(request $request, $id) {
        $a = 10;
        $b = 100;
        $name = $request->name;
        $role = $request->user;
        $location = $request->location;

         $knowledge = $request->knowledge;
            $hasil1 = $knowledge*15/$b;
            $wspeed = $request->wspeed;
            $hasil2 = $wspeed*10/$b;
            $wsoul = $request->wsoul;
            $hasil3 = $wsoul*10/$b; 
            $wqual = $request->wqual;
            $hasil4 = $wqual*10/$b;
            $wpress = $request->wpress;
            $hasil5 = $wpress*5/$b;
            $teamwork = $request->teamwork;
            $hasil6 = $teamwork*5/$b;
            $communicate = $request->communicate;
            $hasil7 = $communicate*5/$b;
            $responbility = $request->responbility;
            $hasil8 = $responbility*5/$b;
            $learning = $request->learning;
            $hasil9 = $learning*5/$b;
            $dicipline = $request->dicipline;
            $hasil10 = $dicipline*5/$b;
            $initiative = $request->initiative;
            $hasil11 = $initiative*5/$b;   
            $creativity = $request->creativity;
            $hasil12 = $creativity*5/$b;     
            $honestly = $request->honestly;
            $hasil13 = $honestly*5/$b;
            $obedience = $request->obedience;
            $hasil14 = $obedience*5/$b;
            $loyalty = $request->loyalty;
            $hasil15 = $loyalty*5/$b;
            $hasil21 = $hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15;
            $total =number_format($hasil21, 2);

            $calc = DB::table('calc')
                ->where('humans_id',$id)
                ->update([
                'knowledge'=> $hasil1,
                'wspeed'=> $hasil2,
                'wsoul'=> $hasil3,
                'wqual'=> $hasil4,
                'wpress'=> $hasil5,
                'teamwork'=> $hasil6,
                'communicate'=> $hasil7,
                'responbility'=> $hasil8,
                'learning' => $hasil9,
                'dicipline' => $hasil10,
                'initiative' => $hasil11,
                'creativity' => $hasil12,
                'honestly' => $hasil13,
                'obedience' =>$hasil14,
                'loyalty' => $hasil15,
                'total' => $total,
            ]);

            if ($role == '3'){
                return redirect('calculator/choice'); 
            }

            else {
                return redirect('outlet/choice/'.$location);       
            }

    }


    public function updatedriver($id) {

         $now = Carbon::now()->format('m');

         $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

            //return view('calculator.staffinput', ['human'=>$human]);
             return view('calculator.editdriver', array(
            'human' => $human,
           // 'job' => $job,
            'now' => $now
            ));
    }

    public function upddriver(request $request, $id){
            $a = 10;
            $b = 100;

            $role = $request->user;
            $location = $request->location;

            $inhuman = $request->id;     

            $knowledge = $request->knowledge;
            $hasil1 = $knowledge*15/$b; 
            $wqual = $request->wqual;
            $hasil4 = $wqual*5/$b;
            $teamwork = $request->teamwork;
            $hasil6 = $teamwork*15/$b;
            $communicate = $request->communicate;
            $hasil7 = $communicate*10/$b;
            $dicipline = $request->dicipline;
            $hasil10 = $dicipline*10/$b;
            $initiative = $request->initiative;
            $hasil11 = $initiative*5/$b;
            $creativity = $request->creativity;
            $hasil12 = $creativity*10/$b;        
            $honestly = $request->honestly;
            $hasil13 = $honestly*10/$b;
            $obedience = $request->obedience;
            $hasil14 = $obedience*15/$b;
            $loyalty = $request->loyalty;
            $hasil15 = $loyalty*5/$b;
            
            $hasil21 = $hasil1+$hasil4+$hasil6+$hasil7+$hasil10+$hasil11+$hasil12+$hasil13+$hasil14+$hasil15;
            $total =number_format($hasil21, 2);

            $calc = DB::table('calc')
            ->where('humans_id', $id)
            ->update([
                'knowledge'=> $hasil1,
                'wqual'=> $hasil4,
                'teamwork'=> $hasil6,
                'communicate'=> $hasil7,
                'dicipline' => $hasil10,
                'initiative' => $hasil11,
                'creativity' => $hasil12,
                'honestly' => $hasil13,
                'obedience' =>$hasil14,
                'loyalty' => $hasil15,
                'total' => $total,
            ]);

            if ($role == '3'){
                return redirect('calculator/choice'); 
            }

            else {
                return redirect('outlet/choice/'.$location);       
            }

    }


    public function destroy($id, $calcid){

        DB::table('calc')->where('no',$calcid)->delete();

        Session::flash('deleted_message', 'penilaian telah dihapus');

        return redirect('HRD/humans/'.$id.'/edit');

    }

}
