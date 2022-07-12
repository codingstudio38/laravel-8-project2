<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessionLoginCon extends Controller
{
   function userlogin(Request $req){
       $data = $req->input();
       $req->session()->put('user_name',$data['username']);
       $req->session()->put('pass',$data['password']);
       session('user_name')."-".session('pass');
       return redirect('sessionProfile');
       
   }
    function sessionLogin(){
        if (session()->has('user_name')) {
            return redirect('sessionProfile');
        } else {
            return view('sessionLogin');
        }
   }

   function checkSessionData(){
        if (!(session()->has('user_name'))) {
            return redirect('logout');
        } else {
            return view('sessionProfile');
        }
   }

   function LogoutSession(){
        if (session()->has('user_name')) {
            session()->pull('user_name', null);
            session()->pull('pass', null);
        }
        return redirect('sessionLogin');
   }

   


} 
 