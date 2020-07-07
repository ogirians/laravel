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



class MasalahController extends Controller
{
	public function master()
	{
 
	// memanggil view tambah
	return view('master');
 
	}

   // method untuk menampilkan view form tambah pelamar
public function tambah()
{
 
	// memanggil view tambah
	return view('store');
 
}

// method untuk insert data ke table pelamar
public function store(Request $request)
{
	// insert data ke table pelamar
		$detail=$request->tipe;
		$fix=$request->penyelesaian;

		$dom = new \domdocument();
		$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		$dom2 = new \domdocument();
		$dom2->loadHtml($fix, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		$images = $dom->getelementsbytagname('img');
		$images2 = $dom2->getelementsbytagname('img');


		foreach($images as $k => $img){
			$judul="judul";
			$data = $img->getattribute('src');

			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);

			$data = base64_decode($data);
			$image_name= time().$judul.'.png';
			$path = public_path() .'/post_img/'. $image_name;

			file_put_contents($path, $data);

			$img->removeattribute('src');
			$img->setattribute('src', '/post_img/'.$image_name);
			
		}

		foreach($images2 as $l => $img2){
			$done = "done";
			$data2 = $img2->getattribute('src');

			list($type2, $data2) = explode(';', $data2);
			list(, $data2)      = explode(',', $data2);

			$data2 = base64_decode($data2);
			$image_name2= time().$done.'.png';
			$path = public_path() .'/post_img/'. $image_name2;

			file_put_contents($path, $data2);

			$img2->removeattribute('src');
			$img2->setattribute('src', '/post_img/'.$image_name2);
		}

		$detail = $dom->savehtml();
		$fix = $dom2->savehtml();
		//$summernote = new Summernote;
		//$summernote->content = $detail;
		//$summernote->save();


	  DB::table('fault')->insert([
		'tproblem' => $request->tproblem,
		'asal' => $request->asal,
		'lawan' => $request->lawan,
		'masalah' => $request->masalah,
		'penyelesaian' => $fix,
		'tgl' => $request->tgl,
		'tipe' => $detail,
		'inti' => $request->inti,
	]);
	// alihkan halaman ke halaman pelamar

	// alihkan halaman ke halaman pelamar
	return redirect('/EDP');

}

// method untuk edit data pelamar
public function edit($no)
{
	// mengambil data pelamar berdasarkan id yang dipilih
	$fault = DB::table('fault')->where('no',$no)->get();
	// passing data pelamar yang didapat ke view edit.blade.php
	return view('edit',['fault' => $fault]);

}	
// update data pelamar
public function update(Request $request)

{
	// update data pelamar
		$detail=$request->tipe;
		$fix=$request->penyelesaian;

		$dom3 = new \domdocument();
		$dom3->loadHtml(utf8_decode($detail), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		$dom4 = new \domdocument();
		$dom4->loadHtml(utf8_decode($fix), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

		$images = $dom3->getelementsbytagname('img');
		$images2 = $dom4->getelementsbytagname('img');


		foreach($images as $k => $img){
			$judul="judul";
			$data = $img->getattribute('src');
			$uploaded = "/post_img/";

			//$mixedStr = "hello world. This is john duvey";
		    //$searchStr= "john";
			if (strpos($data, $uploaded) === FALSE) {
   
			
		    list($type, $data) = explode(';', $data);
			list(,$data)      = explode(',', $data);

			$data = base64_decode($data);
			$image_name= time().'_'.$judul.'.png';
			$path = public_path() .'/post_img/'. $image_name;

			file_put_contents($path, $data);

			$img->removeattribute('src');
			$img->setattribute('src', '/post_img/'.$image_name);

			}

			else{
				; 
			}
			}


		foreach($images2 as $l => $img2){
			$done = "done";
			$data2 = $img2->getattribute('src');
			$uploaded = "/post_img/";

			if (strpos($data2, $uploaded) === FALSE) {

			list($type2, $data2) = explode(';', $data2);
			list(, $data2)      = explode(',', $data2);

			$data2 = base64_decode($data2);
			$image_name2= time().'_'.$done.'.png';
			$path = public_path() .'/post_img/'. $image_name2;

			file_put_contents($path, $data2);

			$img2->removeattribute('src');
			$img2->setattribute('src', '/post_img/'.$image_name2);
			}

			else{
				;
			}
		}


		utf8_encode($detail = $dom3->savehtml());
		utf8_encode($fix = $dom4->savehtml());
		//$summernote = new Summernote;
		//$summernote->content = $detail;
		//$summernote->save();



	// update data pelamar
	DB::table('fault')->where('no',$request->no)->update([
		
		'tproblem' => $request->tproblem,
		'asal' => $request->asal,
		'lawan' => $request->lawan,
		'masalah' => $request->masalah,
		'penyelesaian' => $fix,
		'tgl' => $request->tgl,
		'tipe' => $detail,
		'inti' => $request->inti,
	]);

	$tproblem = $request->only(['tproblem']);
	$asal = $request->only(['asal']);
	$lawan = $request->only(['lawan']);
	$masalah = $request->only(['masalah']);
	$penyelesaian = $request->only(['penyelesaian']);
	$tgl = $request->only(['tgl']);
	$tipe = $request->only(['tipe']); 
	// alihkan halaman ke halaman pelamar
	return redirect('/EDP');
}

// method untuk hapus data pegawai
public function delete($no)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	$fault = DB::table('fault')->where('no',$no)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/EDP');
}




	public function hapus($id){
	// hapus file
	$gambar = Gambar::where('id',$id)->first();
	File::delete('data_file/'.$gambar->file);

	// hapus data
	Gambar::where('id',$id)->delete();

	return redirect()->back();
}





	 public function index()
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('fault')->get();
    	// return data ke view
    	return view('crud', ['masalah' => $masalah]);
    }

    public function frontindex()
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('fault')->get();
    	// return data ke view
    	return view('front', ['masalah' => $masalah]);
    }

    public function detail($no)
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('fault')->where('no', $no)->get();
    	// return data ke view
    	return view('front-detail', ['masalah' => $masalah]);
    }

      public function detailin($no)
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('fault')->where('no', $no)->get();
    	// return data ke view
    	return view('detail', ['masalah' => $masalah]);
    }

   public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pelamar sesuai pencarian data
		$masalah = DB::table('fault')

		->where('tipe','like',"%".$cari."%")
		->where('penyelesaian','like',"%".$cari."%")
			->select('no','tproblem','asal','lawan','masalah','penyelesaian','tgl','tipe')
			->get();

    		// mengirim data pegawai ke view index
		return view('cari', ['masalah' => $masalah]);

	}

}                                                        

//<input type="hidden" name="id" value="{{ $l->id }}"> <br/>
                   // Nama Pelamar <input type="text" required="required" name="nama" value="{{ $l->nama }}"> <br/>