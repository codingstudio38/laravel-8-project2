<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userForm extends Controller
{
    function testRequest(Request $req){
        return $req->input();
    }
}
