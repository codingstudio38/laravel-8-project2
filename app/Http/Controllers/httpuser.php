<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class httpuser extends Controller
{
function viewhttpdata(){
    $data = Http::get("https://reqres.in/api/users?page=1");
    return view("httpuserTABLE",['collection'=>$data['data']]);
} 
} 
