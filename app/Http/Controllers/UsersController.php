<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_user;
class UsersController extends Controller
{ 
    function getData(Request $req){
         return $req->input();
    }
    function directconnection(){
     return $data = DB::select("Select * from tbl_users");
     //return redirect("DbuserTABLE");
    } 

    function modelconnection(){
         return tbl_user::all();
    }



} 
 