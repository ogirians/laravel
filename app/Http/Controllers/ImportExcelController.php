<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index()
    {
     $data = DB::table('customers')->orderBy('id', 'DESC')->get();
     return view('bowner.customer.import_excel', compact('data'));
    }

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();
     if($request->hasFile('select_file')){
            Excel::load($request->file('select_file')->getRealPath(), function ($reader) {
                foreach ($reader->toArray() as $key => $row) {
                    $data['name'] = $row['name'];
                    $data['Address1'] = $row['address1'];
                    $data['Address2'] = $row['address2'];
                    $data['age'] = $row['age'];
                    $data['gender'] = $row['gender'];
                    $data['job'] = $row['job'];
                    $data['city'] = $row['city'];
                    $data['province'] = $row['province'];
                    $data['phone'] = $row['phone'];
                    $data['buy'] = $row['status'];
                    $data['buy'] = $row['buy'];
                    $data['tax_num'] = $row['tax_num'];

                    if(!empty($data)) {
                        DB::table('customers')->insert($data);

                    }
                }
            });
        }
        return back()->with('success', 'Excel Data Imported successfully');

      
     //$data = Excel::load($path)->get();
     //$insert_data[] = array('CustomerName', 'Gender', 'Address', 'City', 'PostalCode', 'Country');

     //if($data->count() > 0)
     //{
      //foreach($data->toArray() as $key => $value)
      //{
       //foreach($value as $row)
       //{
        //$insert_data[] = array(
         //'CustomerName'  => $row['customer_name'],
         //'Gender'   => $row['gender'],
         //'Address'   => $row['address'],
         //'City'    => $row['city'],
         //'PostalCode'  => $row['postal_code'],
         //'Country'   => $row['country']
        //);
      // }
      //}

      //if(!empty($insert_data))
      //{
       //DB::table('tbl_customer')->insert($insert_data);
      //}
     //}
     //return back()->with('success', 'Excel Data Imported successfully.');
    }
}