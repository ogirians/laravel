<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;
use Carbon\Carbon;

class choicePdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function cetak_pdf($location = null)
    {  


    if ($location != null) {

        $humans = DB::table('humans')
                    ->leftjoin('calc','humans.id','=','calc.humans_id')
                    ->select('humans.id','humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('ROUND(AVG(calc.total),1) as skore'),'humans.job','humans.location','humans_level')
                    ->groupBy('humans.id','humans.name','humans.job','humans.location','humans_level')
                    ->where('humans.location',$location)
                    ->where('humans.humans_level','!=',"A")
                    ->where('humans.humans_status','1')
                    ->get();
    }

        else {

                $humans = DB::table('humans')
                      ->leftjoin('calc','humans.id','=','calc.humans_id')
                      ->select('humans.id','humans.name', DB::raw('MAX(calc.pdate) as last_test'),DB::raw('ROUND(AVG(calc.total),1) as skore'),'humans.job','humans.location','humans_level')
                      ->groupBy('humans.id','humans.name','humans.job','humans.location','humans_level')
                      ->where('humans.humans_status','1')
                      ->get();
               
        }

        $now = Carbon::now()->format('d-M-Y');

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true], set_time_limit(300))->loadview('calculator.choice-print',['humans'=> $humans, 'now' => $now])->setPaper('letter');  

       
        //$pdf->setOptions(['enable-javascript', true]);

         //$pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
        return $pdf->download('list_nilai_'.$now.'.pdf');

    }


     public function staffcetak_pdf($id, $calcid)
    {  
        $name = DB::table('humans')
                ->where('id',$id)
                ->value('name');

        $date = DB::Table('calc')
                ->where('no',$calcid)
                ->value('pdate');
        $day = date("d-M-Y", strtotime($date));


        $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

        $calc = DB::table('calc')->where('no',$calcid)->get();


        $now = Carbon::now()->format('d-M-Y');

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true], set_time_limit(300))->loadview('calculator.staff-print',['human'=> $human, 'now' => $now,  'calc' => $calc])->setPaper('legal');  

       
        //$pdf->setOptions(['enable-javascript', true]);

         //$pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
        return $pdf->download($name.'_detail_nilai_'.$day.'.pdf');

    }


    public function drivercetak_pdf($id, $calcid)
    {  



        $name = DB::table('humans')
                ->where('id',$id)
                ->value('name');

        $date = DB::Table('calc')
                ->where('no',$calcid)
                ->value('pdate');
        $day = date("d-M-Y", strtotime($date));



        $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

        $calc = DB::table('calc')->where('no',$calcid)->get();

        $now = Carbon::now()->format('d-M-Y');

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true], set_time_limit(300))->loadview('calculator.driver-print',['human'=> $human, 'now' => $now,  'calc' => $calc])->setPaper('legal');  

       
        //$pdf->setOptions(['enable-javascript', true]);

         //$pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
          return $pdf->download($name.'_detail_nilai_'.$day.'.pdf');

    }


      public function headcetak_pdf($id, $calcid)
    {  

       $name = DB::table('humans')
                ->where('id',$id)
                ->value('name');

        $date = DB::Table('calc')
                ->where('no',$calcid)
                ->value('pdate');
        $day = date("d-M-Y", strtotime($date));

        $human = DB::Table('humans')
                ->where('id', $id)
                ->get();

        $calc = DB::table('calc')->where('no',$calcid)->get();

        $now = Carbon::now()->format('d-M-Y');

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true], set_time_limit(300))->loadview('calculator.head-print',['human'=> $human, 'now' => $now,  'calc' => $calc])->setPaper('legal');  

       
        //$pdf->setOptions(['enable-javascript', true]);

         //$pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
          return $pdf->download($name.'_detail_nilai_'.$day.'.pdf');
    }




    
}