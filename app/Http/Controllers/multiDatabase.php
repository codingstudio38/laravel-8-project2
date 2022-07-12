<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_user;
use App\Models\gallerie;

class multiDatabase extends Controller
{
    // 
    function index(){
        // $dataF= DB::table('tbl_users')->get();
        // $dataS= DB::connection('mysql2')->table('galleries')->get();

        $dataF=tbl_user::all();
        $dataS=gallerie::all();
        return response()->json([
            'dataF'=>$dataF,
            'dataS'=>$dataS,
        ]);
 
    } 
    
} 
