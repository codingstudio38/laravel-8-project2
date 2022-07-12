<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetApidata extends Controller
{
    public $apiurl=null;
    function __construct(){
        $this->apiurl = "http://localhost/laravel/project1/public";
    }
    
    function index(Request $req){
        return view('apidataget');
    } 


    function apiregister(Request $req){
        $response = Http::asForm()->post($this->apiurl."/api/Authregister", [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password
        ]);
        // echo "<pre>";
        // print_r($response->json());
        return redirect('apiget')->with('response',$response->json());
    } 


    
    function apilogin(Request $req){
        $response = Http::asForm()->post($this->apiurl."/api/apiAuthLogin", [
            'email' => $req->email,
            'password' => $req->password
        ]);
        if($response->json()['status_code']=="200"){
            session()->pull('api_response',null);
            session()->put('api_response',$response->json());
        } else {
            session()->pull('api_response',null);
        }
        // echo "<pre>";
        // print_r($response->json());
        return redirect('apiget')->with('response',$response->json());
    } 


    function getapidata(Request $req){
        // http://localhost/laravel/angularApi/public/newdemo/viewallmultidata Bearer 1234567890
        if(session()->has('api_response')){
            $api_session_check = session()->get('api_response');
            $token = "Bearer ".$api_session_check['token'];
            $response = Http::withHeaders([
                'Authorization' => $token,
                'Accept'=>'application/json'
            ])->get($this->apiurl.'/api/apiTest');
            echo "<pre>";
            print_r($response->json());
        } else {
            return redirect('apiget')->with('response',["token not fond..!!"]); exit;
        }
    } 

    function logpotapidata(Request $req){
        if(session()->has('api_response')){
            $api_session_check = session()->get('api_response');
            $token = "Bearer ".$api_session_check['token'];
            $response = Http::withHeaders([
                'Authorization' => $token,
                'Accept'=>'application/json'
            ])->post($this->apiurl.'/api/apiAuthlogout');
            session()->pull('api_response',null);
            echo "<pre>";
            print_r($response->json()); 
             return redirect('apiget')->with('response',$response->json());
        } else {
            $api_session_check = null;
            return redirect('apiget')->with('response',["your are not logged in..!!"]); exit;
        }
    } 
    




}
