<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $humans = DB::table("humans")
        ->where('location','tidar')
        ->get();
        view()->share('humans',$humans);

        if($request->has('download')){
        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('bowner.humans.print');
            // download pdf
            return $pdf->download('karyawan.pdf');
        }
        return view('bowner.humans.print');
    }
}