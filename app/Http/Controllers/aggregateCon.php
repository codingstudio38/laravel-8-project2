<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aggregateCon extends Controller
{
    function  opertion(){
        //return DB::table('tbl_users')->sum('id');
        //return DB::table('tbl_users')->min('id');
        //return DB::table('tbl_users')->max('id');
        return DB::table('tbl_users')->avg('id');
    }
}
