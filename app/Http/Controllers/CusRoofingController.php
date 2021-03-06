<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests\CustomerRequest;
use App\Http\Requests;
use App\Customer;
use DB;

class CusRoofingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rc  = DB::table('roofcalc')
                        ->select('id', 'nama', 'alamat', 'HP')
                        ->get();      
            
        return view('bowner.roofcalc.index', ['rc'=> $rc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bowner.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        //
        $customer = new Customer();

        /*
        $this->validate($request, [
            'phone' => 'required|max:12|unique:customers',
            'tax_num' => 'unique:customers',
        ]);
        */

        $customer->name = $request->name;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->age = $request->age; //update by trison
        $customer->gender = $request->gender; //update by trison
        $customer->job = $request->job; //update by trison
        $customer->phone = $request->phone;
        $customer->status = $request->status; //update by trison
        $customer->buy = $request->buy; //update by trison
        $customer->city = $request->city; //update by trison
        $customer->province = $request->province; //update by trison
        //$customer->tax_num = $request->tax_num;

        $customer->save();

        Session::flash('created_message', 'The new customer has been added');

        return redirect('/bowner/customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $rc = DB::table('roofcalc')->where('id',$id)->select('id', 'nama', 'alamat', 'HP', 'kanal', 'hargakan')->get();
        
        return view('bowner.roofcalc.edit',['rc' => $rc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
      DB::table('roofcalc')->where('id',$request->id)->update([
        'nama' => $request->nama,
        'HP' => $request->HP,
        'alamat' => $request->alamat
    ]);

        Session::flash('update_message', 'The new customer has been updated');

        return redirect('/bowner/customer');
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
        $customer = Customer::findOrFail($id);

        $customer->delete();

        Session::flash('deleted_message', 'The customer has been deleted');

        return redirect('/bowner/customer');
    }
}
