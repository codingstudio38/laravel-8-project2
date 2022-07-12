<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbJoinCon extends Controller
{
    function checkOperation(){
    //return DB::table('tbl_users')
    //->join('company','tbl_users.id','=','company.userId')
    //->where('company.company_name','google')
    //->select('company.*', 'tbl_users.*')
    //->groupBy('tbl_users.id')
    //->get();

    return DB::table('tbl_users')
    ->join('company', 'tbl_users.id', '=', 'company.userId')
    ->select('tbl_users.name as name','tbl_users.email as userEmail','tbl_users.address as userAddress', 'tbl_users.id as USLid', 'company.id as CSLid','company.userId as CUid','company.company_name as name')
    ->get();
    }
}
