<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\NewUserExport;
class ExportxlController extends Controller
{
    function index(Request $req){
        $users = DB::table('tbl_users')->select('id','name','email','address')->get(); //my data colection
        ob_end_clean(); // use this
        ob_start(); // and this
        $data = array();
        foreach($users as $key => $val){
            $data[]= array(
                "id" =>$val->id,
                "name" =>$val->name,
                "email" =>$val->email,
                "address" =>$val->address
            );
        }
        return Excel::download(new NewUserExport($users),'usersList.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    } 
 


}
  