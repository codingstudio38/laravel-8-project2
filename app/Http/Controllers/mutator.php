<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_vss;

class mutator extends Controller
{
    // 
    function index(){
     //return $data = customer_vss::all();
     $test = new customer_vss();
     $test->email="testemail@gmail.com";
     $test->phone="8763699746";
     $test->name="bidyut kumar";
     $test->save();
    } 
}
