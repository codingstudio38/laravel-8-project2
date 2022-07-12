<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class stubTest extends Controller
{
    // 
    function index(Request $req){
     return $req->input();
    } 
}
