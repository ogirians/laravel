<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class RoofingController extends Controller
{
    public function index()
    {
    	return view('roofcalc.front');
    }

    public function custom()
    {
    	return view('roofcalc.on');
    }

    public function perisai()
    {
    	return view('roofcalc.perisai');
    }

    public function limas()
    {
    	return view('roofcalc.limas');
    }

    public function jurai()
    {
    	return view('roofcalc.jurai');
    }

    // method untuk insert data ke table pegawai
	public function perisaipost(Request $request)
	{
		$x = $request->panjang;
		$y = $request->lebar;
    		$z = 2*(($y/2*1.25)*$x);
    	// insert data ke table pegawai
		DB::table('roofcalc')->insert([
		'Panjang' => $request->panjang,
		'Lebar' => $request->lebar,
		'Hasil' => $z,
		]);
		
	// alihkan halaman ke halaman pegawai
	return redirect('/roofcalc/custom');
	}

	public function limaspost(Request $request)
	{
		$x = $request->panjang;
		$y = $request->lebar;
    		$z = 2*(($y/2*1.25)*$x);
    	// insert data ke table pegawai
		DB::table('roofcalc')->insert([
		'Panjang' => $request->panjang,
		'Lebar' => $request->lebar,
		'Hasil' => $z,
		]);
		
	// alihkan halaman ke halaman pegawai
	return redirect('/roofcalc/custom');
	}

	public function juraipost(Request $request)
	{
		$x = $request->panjang;
		$y = $request->lebar;
    		$z = 2*(($y/2*1.25)*$x);
    	// insert data ke table pegawai
		DB::table('roofcalc')->insert([
		'Panjang' => $request->panjang,
		'Lebar' => $request->lebar,
		'Hasil' => $z,
		]);
		
	// alihkan halaman ke halaman pegawai
	return redirect('/roofcalc/custom');
	}
}
