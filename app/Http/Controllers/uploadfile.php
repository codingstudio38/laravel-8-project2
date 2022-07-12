<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadfile extends Controller
{ 
    function uploadFILE(Request $req){
        $req->file('InputFile')->store('img');
        if($req){
            $msg = "Upload SuccessFully";
        } else {
            $msg = "Failed To Upload..!!";
        }
        return view('fileUpload',['Smsg'=>$msg]);
    }
}
