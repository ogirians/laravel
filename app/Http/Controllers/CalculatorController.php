<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
                    ->select('humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('AVG(calc.total) as skore'),'humans.job','humans.location')
                    ->groupBy('humans.name','humans.job','humans.location')
                    ->where('humans.location',$location)
                    ->where('humans.job','not like',"%".$e."%")
                    ->get();
        }

        else {

                $karyawan3 = DB::table('humans')
                      ->leftjoin('calc','humans.id','=','calc.humans_id')
                      ->select('humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('AVG(calc.total) as skore'),'humans.job','humans.location')
                      ->groupBy('humans.name','humans.job','humans.location')
                      ->get();
        }

        $now = Carbon::now()->format('M');


        return view('calculator.choice', array(
        'karyawan3' => $karyawan3,
        'now' => $now,
        //'dll' => $dll,
        // 'detail' => $detail,    
        ));


      //return view('calculator.choice', ['karyawan2' => $karyawan2]);
}

    public function tamp(){
        $calc = DB::table('calc')->get();
        return view('calculator.tamp', ['calc' => $calc]);
    }

    public function index(){
        $calc = DB::table('calc')->get();
        return view('calculator.index', ['calc'=>$calc]);
    }

     public function inputdriver(){
        $human = DB::table('humans')
        ->select('id','name')
        ->get();
        return view('calculator.driverinput', ['human'=>$human]);
    }

    public function inputstaff($location){
        $human = DB::table('humans')
        ->select('id','name')
        ->where('location',$location)
        ->get();

        $job = DB::table('humans')
        ->select('job')
        ->groupBY('job')
        ->get();


        //return view('calculator.staffinput', ['human'=>$human]);
         return view('calculator.staffinput', array(
        'human' => $human,
        'job' => $job,
        ));
    }

    public function store(request $request){
        $calc = DB::table('calc')->insert([
          'hasil1'=> $request -> $hasil1,
    ]);
    }

    public function calculator(request $request){
        $a = 10;
        $b = 100;

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

        $calc = DB::table('calc')->insert([
            'name'=> $request->name,
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
            'organate' => $hasil16,
            'coaching' => $hasil17,
            'controling' => $hasil18,
            'planing' => $hasil19,
            'delegate' => $hasil20,
            'total' => $hasil21,
        ]);
        return view('calculator.choice', ['calc' => $calc]);       
        //return view('/calculator/tamp', compact('knowledge','wspeed','wsoul','wqual','wpress','teamwork','communicate','responbility','learning','dicipline','initiative','creativity','honestly','obedience','loyalty','organate','coaching','controling','planing','delegate','total'));
       
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

            // mengambil data dari table pelamar sesuai pencarian data
        $calc = DB::table('calc')
        ->where('name','like',"%".$cari."%")
            ->get();

            // mengirim data pegawai ke view index
        return view('calculator.tamp', ['calc' => $calc]);

    }

   

     public function calculatordriver(request $request){
        $a = 10;
        $b = 100;

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

        $calc = DB::table('calc')->insert([
            'name'=> $request->name,
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
            'total' => $hasil21,
        ]);
         return view('calculator.choice', ['calc' => $calc]);
    }

     public function tampdrive(){
        $d = 'Driver';
        $f = 'Helper';
        $calc = DB::table('calc')
        ->where('position','Driver')->orwhere('position','Helper')
        ->select('no','name','position','location','pdate','knowledge','wqual','teamwork','communicate','dicipline','initiative','honestly', 'creativity','obedience','loyalty','total')->get('no','name','position','location','pdate','knowledge','wqual','teamwork','communicate','dicipline','initiative','creativity','honestly','obedience','loyalty','total');
        return view('calculator.drivertamp', ['calc' => $calc]);
    }



    public function calculatorstaff(request $request){
        $a = 10;
        $b = 100;
        $name = $request->name;

        $role = $request->user;

        $human = DB::table('humans')
                ->select('id')
                ->where('name',$name)
                ->first();

        $inhuman = $human->id;        

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
            'total' => $hasil21,
        ]);

        if ($role == '3'){
            return redirect('calculator/tampstaff'); 
        }

        else {
            return redirect('outlet/tampstaff');       
        }

        //return view('/calculator/tamp', compact('knowledge','wspeed','wsoul','wqual','wpress','teamwork','communicate','responbility','learning','dicipline','initiative','creativity','honestly','obedience','loyalty','organate','coaching','controling','planing','delegate','total'));
       
    }

    public function tampstaff(){
        $e = 'Staff';
        $calc = DB::table('calc')
        ->where('position','like',"%".$e."%")
        ->select('no','humans_id','position','location','pdate','knowledge','wspeed','wsoul','wqual','wpress','teamwork','communicate','responbility','learning','dicipline','initiative','creativity','honestly','obedience','loyalty','total')
        ->get('no','name','position','location','pdate','knowledge','wsoul','wqual','wpress','teamwork','communicate','responbility','learning','dicipline','initiative','creativity','honestly','obedience','loyalty','total');

        $calctritan = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Tritan')
            ->get();
        $calcmenggala = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Menggala')
            ->get();
        $calckania710 = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Kania710')
            ->get();
        $calcabm = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','ABM')
            ->get();
        $calclombok = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Tania Lombok')
            ->get();            
        $calcbkj = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','BKJ')
            ->get();
        $calcmanna = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Manna')
            ->where('location','Manna')
            ->get();
        $calctidar = DB::table('calc')
            ->where('position','like',"%".$e."%")
            ->where('location','Tania Tidar')
            ->get();    
         return view('calculator.stafftamp', array(
        'calc' => $calc,
        'calctritan' => $calctritan,
        'calcmenggala' => $calcmenggala,
        'calckania710' => $calckania710,
        'calcabm' => $calcabm,
        'calclombok' => $calclombok,
        'calcbkj' => $calcbkj,
        'calcmanna' => $calcmanna,
        'calctidar' => $calctidar,
        ));
        }
}
