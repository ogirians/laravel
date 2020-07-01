<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Gambar;
use App\Pelamar;
use File;
use App\Mail\RegistrasiEmail;
use Illuminate\Support\Facades\Mail;


class SORController extends Controller
{
	public function index()
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('sheet1')->get();
    	// return data ke view
    	return view('SO.crud', ['masalah' => $masalah]);
    }    
}
