<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_vss;

class accessors extends Controller
{
    //
    function index(){
        return $data = customer_vss::all();
    }
}
