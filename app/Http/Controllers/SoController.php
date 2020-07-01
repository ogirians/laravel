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



class SoController extends Controller
{
	public function master()
	{
 
	// memanggil view tambah
	return view('so.master');
 
	}

   // method untuk menampilkan view form tambah pelamar
public function tambah()
{
 
	// memanggil view tambah
	return view('so.store');
 
}

// method untuk insert data ke table pelamar
public function store(Request $request)
{
    
    
  	 if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=time()."_".$image->getClientOriginalName();
                $image->move(public_path().'/data_buktinp/',$name);  // your folder path
                $data[] = $name;  
            }
        }
        
        else {
    	$data[] = 'nopic.png';
	   }
	
	// insert data ke table pelamar
	DB::table('so')->insert([
		'tanggal' => $request->tanggal,
		'outlet' => $request->outlet,
		'editor' => $request->editor,
		'transaksi' => $request->transaksi,
		'status' => $request->status,
		'keterangan' => $request->keterangan,
		'berita' => $request->berita,
		'bukti' => json_encode($data),
		
	]);
 
		// menyimpan data file yang diupload ke variabel $file
		//'foto' => $request->only('file');
		//$file = $foto['file'];
		//$nama_file = $file->getClientOriginalName();
 
		//$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		//$tujuan_upload = 'data_file';
		//$file->move($tujuan_upload,$nama_file);
 
	// alihkan halaman ke halaman pelamar
	return redirect('so');

}

// method untuk edit data pelamar
public function edit($no)
{
	// mengambil data pelamar berdasarkan id yang dipilih
	$np = DB::table('so')->where('no',$no)->get();
	// passing data pelamar yang didapat ke view edit.blade.php
	return view('so.edit',['np' => $np]);

}	
// update data pelamar
public function update(Request $request)
{
    
   $data2 = DB::table('sheet1')->where('no', $request->no)->value('bukti');
    $pic = $request->only(['file']);

    if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=time()."_".$image->getClientOriginalName();
                $image->move(public_path().'/data_buktinp/',$name);  // your folder path
                $data[] = $name;  
            }
        }
        
	 else {
	   
    	$data[] = $data2;
	}
    
	// update data pelamar
	DB::table('so')->where('no',$request->no)->update([
		
		'tanggal' => $request->tanggal,
		'outlet' => $request->outlet,
		'editor' => $request->editor,
		'transaksi' => $request->transaksi,
		'status' => $request->status,
		'keterangan' => $request->keterangan,
		'berita' => $request->berita,
    	'bukti' => json_encode($data),
	]);

	$tanggal = $request->only(['tanggal']);
	$outlet = $request->only(['outlet']);
	$editor = $request->only(['editor']);
	$transaksi = $request->only(['transaksi']);
	$status = $request->only(['status']);
	$keteranga = $request->only(['keterangan']);
	$berita = $request->only(['berita']);
	

	// alihkan halaman ke halaman pelamar
	return redirect('/so');
}

// method untuk hapus data pegawai
public function delete($no)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	$np = DB::table('so')->where('no',$no)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/so');
}

	 public function index()
    {
        
         $outlet = DB::table('so')
        ->select('outlet')
        ->groupBy('outlet')
        ->get();
    	// mengambil semua data pengguna
    	$masalah = DB::table('so')->get();
    	// return data ke view

    	return view('so.crud', array(
        'masalahnp' => $masalah,
        'outlet' => $outlet
        ));
    }


    public function frontindex()
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('so')->get();
    	// return data ke view
    	return view('so.front', ['masalah' => $masalah]);
    }


	public function upload(){
		$gambar = Gambar::get();
		return view('upload',['gambar' => $gambar]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Gambar::create([
			'file' => $nama_file,
		]);
 
		return redirect()->back();
	}
	
	public function parah(Request $request)
	{

		$date = $request->only(['start_date']);
		$date2 = $request->only(['finish_date']);
		$posisi = $request->only(['pos']);
	


		$start = $date['start_date'];
		$end = $date2['finish_date'];
		$pos = $posisi['pos'];

		
		if ($start == null) {
			$start = DB::table('so')->min('tanggal');
			//$start = DB::table('sheet1')->whereDate('tanggal', '=', $hmm)->get();
		};

		if ($end == null) {		
			$end = DB::table('so')->max('tanggal');
		};

		if ($pos == null) {
			$pos = 'none';
		};


		$start2 = date('2019-12-03');
		$end2 = date('2019-12-05');

		//$filter = $pelamar->where('created_at',[$start2,$end2]);

		return redirect("dosa/filter/{$start}/{$end}/{$pos}");
	}


    public function filter($start,$end,$pos)
    	{
         $outlet = DB::table('so')
        ->select('outlet')
        ->groupBy('outlet')
        ->get();
    
    	if ($pos == 'none')
    	{
    		$pos = '';
    	};
    	
    		$pelamar = DB::table('so')															
    		->whereDate('so.tanggal', '>=', $start)
    		->whereDate('so.tanggal', '<=', $end)
    		->where('so.outlet', 'like', "%".$pos."%")
    		->get();
    
    		//$filter = $pelamar->where('created_at',[$start2,$end2]);
    
    
    			return view('so.crud', array(
                'masalahnp' => $pelamar,
                'outlet' => $outlet
        ));
    	}
    	



    	
 public function frontindexnp()
    {
    	// mengambil semua data pengguna

    $masalahnp = DB::table('so')->select('no', 'tanggal', 'outlet','editor', 'transaksi', 'status', 'keterangan', 'berita','bukti')
                                ->where('toleransi', '=','Tidak' )
                                ->get();
    	// return data ke view
    	
    
        
        
            // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    
    $start = DB::table('stats')->max('start');
    
    $end = DB::table('stats')->max('end');
                               
    $skore = DB::table('so')->select('outlet', DB::raw('count(outlet) as outlet_count'))
                               ->whereDate('so.tanggal', '>=', $start)
		                       ->whereDate('so.tanggal', '<=', $end)
                               ->groupBy('outlet')
                               ->get();
    
    //$skore = DB::table('sheet1')->select('outlet',count('outlet' as outlet_count))->groub
    // return data ke view
    //return view('pd.front', ['masalah' => $masalah]);
    return view('so.frontnp', array(
        //'masalah' => $masalah,
        'masalahnp' => $masalahnp,
        'date' => $date,
        'score' => $skore,
    ));
    
    //return view('controller.view', array('users' => $users,
      //         'projects' => $projects ,'foods' => $foods));
               
    //return view('controller.view', compact('users','projects','foods'));
    
    //SELECT outlet, count(outlet) as outlet_count FROM sheet1 GROUP BY outlet
        
        
        
        
    }
    
    
    
    public function instatsnp()
{
    
    // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    
    $start = DB::table('stats')->max('start');
    
    $end = DB::table('stats')->max('end');
                               
    $skore = DB::table('so')->select('outlet', DB::raw('count(outlet) as outlet_count'))
                               ->whereDate('so.tanggal', '>=', $start)
		                       ->whereDate('so.tanggal', '<=', $end)
                               ->groupBy('outlet')
                               ->get();
          
    
    
    $data = ["title" => "hello", "description" => "test test test"];
        
   
    
    return view('so.statsnp', array(
        //'masalah' => $masalah,
        'date' => $date,
        'score' => $skore,
        //'pelaku' => $pelaku,
        //'loop' => $loop,
    ));
    
}

public function pelakunp($outlet) 
{
      // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    $start = DB::table('stats')->max('start');
    $end = DB::table('stats')->max('end');
    $editor = $outlet;
    $pelaku = DB::table('so')->select('editor', DB::raw('count(editor) as editor_count'))
                               ->whereDate('so.tanggal', '>=', $start)
		                       ->whereDate('so.tanggal', '<=', $end)
		                       ->where('so.outlet', $outlet)
                               ->groupBy('editor')
                               ->get();
    
    
    return view('so.outletnp', array(
        //'masalah' => $masalah,
        'date' => $date,
        //'score' => $skore,
        'pelaku' => $pelaku,
        'editor' => $editor,
        //'loop' => $loop,
    ));
    
    //return view('controller.view', array('users' => $users,
      //         'projects' => $projects ,'foods' => $foods));
               
    //return view('controller.view', compact('users','projects','foods'));
    
    //SELECT outlet, count(outlet) as outlet_count FROM sheet1 GROUP BY outlet
}

public function pelakuso($outlet) 
{
      // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    $start = DB::table('stats')->max('start');
    $end = DB::table('stats')->max('end');
    $editor = $outlet;
    $pelaku = DB::table('so')->select('editor', DB::raw('count(editor) as editor_count'))
                               ->whereDate('so.tanggal', '>=', $start)
		                       ->whereDate('so.tanggal', '<=', $end)
		                       ->where('so.outlet', $outlet)
                               ->groupBy('editor')
                               ->get();
    
    
    return view('so.front-outletnp', array(
        //'masalah' => $masalah,
        'date' => $date,
        //'score' => $skore,
        'pelaku' => $pelaku,
        'editor' => $editor,
        //'loop' => $loop,
    ));
    
    //return view('controller.view', array('users' => $users,
      //         'projects' => $projects ,'foods' => $foods));
               
    //return view('controller.view', compact('users','projects','foods'));
    
    //SELECT outlet, count(outlet) as outlet_count FROM sheet1 GROUP BY outlet
}
	

    } 
    
    
    
    



//<input type="hidden" name="id" value="{{ $l->id }}"> <br/>
                   // Nama Pelamar <input type="text" required="required" name="nama" value="{{ $l->nama }}"> <br/>