<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ExportEmployeeController extends Controller
{
    function index()
    {
     $humans_data = DB::table('humans')->get();
     return view('export_excelkaryawan')->with('humans_data', $humans_data);
    }

     function excelkaryawan()
    {
     $humans_data = DB::table('humans')->get()->toArray();
     $humans_array[] = array('name','job', 'start_day','birth', 'gender', 'address1', 'address2', 'phone', 'idnum', 'location');
     foreach($humans_data as $humans)
     {
      $humans_array[] = array(
       'name'  => $humans->name,
       'job'   => $humans->job,
       'start_day'   => $humans->start_day,
       'birth'    => $humans->birth,
       'gender'    => $humans->gender,
       'address1'    => $humans->address1,
       'address2'    => $humans->address2,
       'phone'  => $humans->phone,
       'idnum'   => $humans->idnum,
       'location'    => $humans->location
      );
     }
     Excel::create('Employee Data', function($excelkaryawan) use ($humans_array){
      $excelkaryawan->setTitle('Employee Data');
      $excelkaryawan->sheet('Employee Data', function($sheet) use ($humans_array){
       $sheet->fromArray($humans_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }
}

?>