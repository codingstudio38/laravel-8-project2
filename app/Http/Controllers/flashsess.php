<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class flashsess extends Controller
{
   function storeMember(Request $req){
       $data = $req->input();
       $req->session()->flash('User_Name',$data['user']);
       $req->session()->flash('pass',$data['password']);
       $req->session()->flash('email',$data['email']);
       return redirect('flashSession'); 
   }
}
