<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ExportController extends Controller
{
    function index()
    {
     $customer_data = DB::table('customers')->get();
     return view('export_excel')->with('customer_data', $customer_data);
    }

    function excel()
    {
     $customer_data = DB::table('customers')->get()->toArray();
     $customer_array[] = array('name','address1', 'address2','age', 'gender', 'job', 'city','province', 'phone', 'status', 'buy', 'tax_num');
     foreach($customer_data as $customer)
     {
      $customer_array[] = array(
       'name'  => $customer->name,
       'address1'   => $customer->address1,
       'address2'   => $customer->address2,
       'age'    => $customer->age,
       'gender'    => $customer->gender,
       'job'    => $customer->job,
       'city'    => $customer->city,
       'province'  => $customer->province,
       'phone'   => $customer->phone,
       'status'    => $customer->status,
       'buy'    => $customer->buy,
       'tax_num'   => $customer->tax_num
      );
     }
     Excel::create('Customer Data', function($excel) use ($customer_array){
      $excel->setTitle('Customer Data');
      $excel->sheet('Customer Data', function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }
}

?>