<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_users;
use App\Models\angularUser_tbl;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\livewire;
use App\Models\multiphoto;
use Excel;
use PDF; 
use App\Imports\UserImport;
use App\Exports\UserExport;
use Illuminate\Support\Facades\DB;
class GeneratePdf extends Controller
{
    //
    function index(Request $req){
     return $req->input();
    } 
       public function Crearepdf() 
    { 
       $data = tbl_users::orderBy('id', 'DESC')->get(); 
    //    $pdf = PDF::loadView('Paginatpdf_', ['collection'=>$data,'i'=>1]);
    //    return $pdf->download('userDetails.pdf');
$customPaper = array(0,0,720,1440);
        $pdf=PDF::loadView('Paginatpdf_',['collection'=>$data,'i'=>1])->setPaper($customPaper,'landscape');
        $pdf->getDomPDF()->set_option("enable_php", true);
    //$pdf->setPaper('L', 'landscape');landscape
    //$pdf->setPaper($customPaper,'portrait');
    return $pdf->stream('test_pdf.pdf');
    }
 
}
