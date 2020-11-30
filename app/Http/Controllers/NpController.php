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
use Excel;



class NpController extends Controller
{
	public function master()
	{
 
	// memanggil view tambah
	return view('np.master');
 
	}

   // method untuk menampilkan view form tambah pelamar
public function tambah()
{
 
	// memanggil view tambah
	return view('np.store');
 
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
	DB::table('np2')->insert([
		'tanggal' => $request->tanggal,
		'outlet' => $request->outlet,
		'editor' => $request->editor,
		'transaksi' => $request->transaksi,
		'status' => $request->status,
		'keterangan' => $request->keterangan,
		'berita' => $request->berita,
		'toleransi' => $request->toleransi,
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
	return redirect('dosanp');

}

// method untuk edit data pelamar
public function edit($no)
{
	// mengambil data pelamar berdasarkan id yang dipilih
	$np = DB::table('np2')->where('no',$no)->get();
	// passing data pelamar yang didapat ke view edit.blade.php
	return view('np.edit',['np' => $np]);

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
	DB::table('np2')->where('no',$request->no)->update([
		
		'tanggal' => $request->tanggal,
		'outlet' => $request->outlet,
		'editor' => $request->editor,
		'transaksi' => $request->transaksi,
		'status' => $request->status,
		'keterangan' => $request->keterangan,
		'berita' => $request->berita,
		'toleransi' => $request->toleransi,
		'bukti' => json_encode($data),
	]);

	$tanggal = $request->only(['tanggal']);
	$outlet = $request->only(['outlet']);
	$editor = $request->only(['editor']);
	$transaksi = $request->only(['transaksi']);
	$status = $request->only(['status']);
	$keteranga = $request->only(['keterangan']);
	$berita = $request->only(['berita']);
	$toleransi = $request->only(['toleransi']);
	 

	// alihkan halaman ke halaman pelamar
	return redirect('/dosanp');
}

// method untuk hapus data pegawai
public function delete($no)
{
	// menghapus data pegawai berdasarkan id yang dipilih
	$np = DB::table('np2')->where('no',$no)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/dosanp');
}

	 public function index()
    {
        
          $outlet = DB::table('np2')
        ->select('outlet')
        ->groupBy('outlet')
        ->get();
    	// mengambil semua data pengguna
    	$masalah = DB::table('np2')
    	->orderBy('no','desc')
    	->limit(100)
    	->get();
    	// return data ke view

    	return view('np.crud', array(
        'masalahnp' => $masalah,
        'outlet' => $outlet,
        'mulai' => null,
        'selesai' => null,
        'loc' => null,
        ));
    }


    public function frontindex()
    {
    	// mengambil semua data pengguna
    	$masalah = DB::table('np2')->get();
    	// return data ke view
    	return view('np.front', ['masalah' => $masalah]);
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
		/**$messages = [
		'date' => ':attribute salah',
    	'required' => ':attribute wajib isi',
    	'after_or_equal' => ':attribute salah, harus setelah tanggal mulai',
    	'string' => ':attribute harus huruf',
    	'integer' => ':attribute harus angka',

		];

		$this->validate($request,[
		'start_date' => 'nullable|date',
		'finish_date' => 'date|after_or_equal:start_date|nullable',
		'pos' => 'nullable|string',
		'old_min' => 'nullable|integer',
		'old_max' => 'nullable|integer',	
		],$messages);

		$pel = $request->only('start_date');
		**/

		$date = $request->only(['start_date']);
		$date2 = $request->only(['finish_date']);
		$posisi = $request->only(['pos']);
	


		$start = $date['start_date'];
		$end = $date2['finish_date'];
		$pos = $posisi['pos'];

		
		if ($start == null) {
			$start = 0000-00-00;
			//$start = DB::table('sheet1')->whereDate('tanggal', '=', $hmm)->get();
		};

		if ($end == null) {		
			$end = DB::table('np2')->max('tanggal');
		};

		if ($pos == null) {
			$pos = 'none';
		};


		//$filter = $pelamar->where('created_at',[$start2,$end2]);

		return redirect("dosanp/filter/{$start}/{$end}/{$pos}");
	}


    public function filter($start,$end,$pos)
    	{
        
        
    	if ($pos == 'none')
    	{
    		$posn = '';
    	}
    	else
        {
            $posn=$pos;
        };
    	
    	$mulai = $start;
        $selesai = $end;
        $loc = $posn;
    	
    	 $outlet = DB::table('np2')
        ->select('outlet')
        ->groupBy('outlet')
        ->get();
        
    		$pelamar = DB::table('np2')															
    		->whereDate('np2.tanggal', '>=', $start)
    		->whereDate('np2.tanggal', '<=', $end)
    		->where('np2.outlet', 'like', "%".$posn."%")
    		->get();
    
    		//$filter = $pelamar->where('created_at',[$start2,$end2]);
    
   
    		return view('np.crud', array(
            'masalahnp' => $pelamar,
            'outlet' => $outlet,
            'mulai' => $mulai,
            'selesai' => $selesai,
            'loc' => $pos,
            ));
    	}
    	
    	
function excel_np($start,$end,$pos)
    {
        if ($pos == 'none')
    	{
    		$posn = '';
    	}
    	 else
            {
                $posn=$pos;
            };
        
        
        if ($start == "null") {
             
        $masalah= DB::table('np2')															
    		->get()
    		->toArray();
            
        }
        else {
        $masalah= DB::table('np2')															
    		->whereDate('np2.tanggal', '>=', $start)
    		->whereDate('np2.tanggal', '<=', $end)
    		->where('np2.outlet', 'like', "%".$posn."%")
    		->get()
    		->toArray();
        };
    
         $masalah_array[] = array('tanggal','nama_outlet','nama_editor','status','no_transaksi', 'keterangan', 'no_berita', 'toleransi');
         
         foreach($masalah as $m)
         {
          $masalah_array[] = array(
           'tanggal'  => $m->tanggal,
           'nama_outlet'   => $m->outlet,
           'nama_editor'   => $m->editor,
           'status'    => $m->status,
           'no_transaksi'    => $m->transaksi,
           'keterangan'    => $m->keterangan,
           'no_berita'    => $m->berita,
           'toleransi'  => $m->toleransi,
          );
         }
         
         Excel::create('Masalah Data', function($excel_np) use ($masalah_array){
          $excel_np->setTitle('Masalah Data');
          
          $excel_np->sheet('Masalah Data', function($sheet) use ($masalah_array){
           $sheet->fromArray($masalah_array, null, 'A1', false, false);
          });
         })->download('xlsx');
    }
    
    
    	



    	
 public function frontindexnp()
    {
    	// mengambil semua data pengguna

    $masalahnp = DB::table('np2')->select('no', 'tanggal', 'outlet','editor', 'transaksi', 'status', 'keterangan', 'berita','bukti')
                                ->where('toleransi', '!=','Ya' )
                                ->get();
    	// return data ke view
    	
    
        
        
            // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    
    $start = DB::table('stats')->max('start');
    
    $end = DB::table('stats')->max('end');
                               
    $skore = DB::table('np2')->select('outlet', DB::raw('count(outlet) as outlet_count'))
                               ->whereDate('np2.tanggal', '>=', $start)
		                       ->whereDate('np2.tanggal', '<=', $end)
                               ->groupBy('outlet')
                               ->get();
    
    //$skore = DB::table('sheet1')->select('outlet',count('outlet' as outlet_count))->groub
    // return data ke view
    //return view('pd.front', ['masalah' => $masalah]);
    return view('np.frontnp', array(
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
                               
    $skore = DB::table('np2')->select('outlet', DB::raw('count(outlet) as outlet_count'))
                               ->whereDate('np2.tanggal', '>=', $start)
		                       ->whereDate('np2.tanggal', '<=', $end)
		                       ->where('np2.toleransi', '=', 'tidak')
                               ->groupBy('outlet')
                               ->get();
          
    
    
    $data = ["title" => "hello", "description" => "test test test"];
        
   
    
    return view('np.statsnp', array(
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
    $pelaku = DB::table('np2')->select('editor', DB::raw('count(editor) as editor_count'))
                               ->whereDate('np2.tanggal', '>=', $start)
		                       ->whereDate('np2.tanggal', '<=', $end)
		                       ->where('np2.outlet', $outlet)
                               ->groupBy('editor')
                               ->get();
    
    
    return view('np.outletnp', array(
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

public function pelakunp2($outlet) 
{
      // mengambil semua data pengguna
    //$masalah = DB::table('sheet1')->get();
    $date = DB::table('stats')->get();
    $start = DB::table('stats')->max('start');
    $end = DB::table('stats')->max('end');
    $editor = $outlet;
    $pelaku = DB::table('np2')->select('editor', DB::raw('count(editor) as editor_count'))
                               ->whereDate('np2.tanggal', '>=', $start)
		                       ->whereDate('np2.tanggal', '<=', $end)
		                       ->where('np2.outlet', $outlet)
                               ->groupBy('editor')
                               ->get();
    
    
    return view('np.front-outletnp', array(
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