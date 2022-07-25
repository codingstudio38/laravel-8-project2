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
    $pdf=PDF::loadView('Paginatpdf_',['collection'=>$data,'i'=>1])->setPaper("A3",'landscape');
    $pdf->getDomPDF()->set_option("enable_php", true);
    //$pdf->setPaper('L', 'landscape');landscape
    //$pdf->setPaper($customPaper,'portrait');
    $pdf->output();
    $dom_pdf = $pdf->getDomPDF();
    $canvas = $dom_pdf->get_canvas();
    $canvas->page_text(60, 37, "Page - {PAGE_NUM} of {PAGE_COUNT}", null, 12, array(255,0,0));
    return $pdf->stream('test_pdf.pdf');
    }
 
}
