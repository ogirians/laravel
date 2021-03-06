<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Leave;
use DB;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $humanres = DB::Table('humans')
                ->join('leaves','humans.id','=','leaves.human_id')
                ->select('humans.id','humans.start_day','humans.job','humans.name','humans.photo','humans.location','leaves.leave_date','leaves.days')
                ->where('humans.humans_status', 0)
                ->get();

        $leaves = Leave::all();

        return view('bowner.leaves.index', compact('humanres'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($location)
    {
 
      $humanres = DB::Table('humans')
                ->join('leaves','humans.id','=','leaves.human_id')
                ->select('humans.id','humans.start_day','humans.job','humans.name','humans.photo','humans.location','leaves.leave_date','leaves.days')
                ->where('humans.humans_status', 0)
                ->where('location',$location)
                ->get();

        return view('bowner.leaves.index', compact('humanres'));
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
        $leave = Leave::findOrFail($id);

        return view('bowner.leaves.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $leave = Leave::findOrFail($id);

        $leave->update($request->all());

        return redirect('/bowner/leaves');
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
    }
}
