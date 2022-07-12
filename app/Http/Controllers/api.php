<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\member;
use App\Models\User;
use Illuminate\Support\Str;
class api extends Controller 
{
  


    function Authregister(Request $request){
        $request->input();
        $data = Validator::make($request->all(),[
            'name'=>'required|string|max:190',
            'email'=>'required|email|max:190|unique:users,email',
            'password'=>'required|max:20',
        ]);
        if($data->fails()){
        return response()->json(['status_code' => 400,'massage' => $data->errors()]);
        }
        $user = new User();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
       $result = $user->save();
        if($result=="1"){
            return response()->json([
                    'user' => $user,
                    'status_code' => 200,
                    'massage' => 'User Created Successfully..',
            ]);
        } else {
            return response()->json([
                    'status_code' => 400,
                    'massage' => 'Failed To Create User..',
            ]);
        }
        
    }
  
    function Authlogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
        return response()->json(['status_code' => 400,'massage' => $data->errors()]);
        }
        // return $request;exit;
        // $credentials = request(['email','password']);
        //     if(!Auth::attempt($credentials)){
        //     return response()->json([
        //         'status_code' => 500,
        //         'massage' => 'Unaithorized'
        //     ]);
        // } 
            $user= User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
             return response()->json([
                'status_code' => 400,
                'massage' => 'These credentials do not match our records. Unaithorized'
            ]);
            }
            $token = $user->createToken('my-app-token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'status_code' => 200,
                'token' => $token
            ]);
            // $http = new \GuzzleHttp\Client;
            // $result = $http->post('http://127.0.0.1:8000/api/apiAuthLogin?',[
            //     'headers' =>[
            //         'Authorization' =>$token,
            //         'Accept'=>'application/json'
            //     ]
            // ]);
            // return $request->header(); 
            // return redirect('api/apiTest');    
        
    }   
    
    function Authlogout(Request $request){
        $request->user()->currentAccessToken()->delete();
        //auth()->user()->tokens()->delete();
        return response(['status_code' => 200,'massage'=>'Logout Successfully...']);

    }

    function getData(Request $request){
    //  return $detail=[
    //      'randomcode' => "Bearer ".Str::random(60),
    //      'HashCode' => Hash::make(Str::random(60)),
    //      'user'=> Auth::user(),
    //      'bearerToken'=> $request->bearerToken(),
    //      'header'=>  $request->header(),
    // ];
    // exit;
    $data = member::all();
    return response()->json([
                'data' => $data,
                'status_code' => 200,
            ]);
    // return view('apiDataView',[
    //     'dataCol'=>$data,
    //     'i'=>1
    //     ]);

    }  
       
    function uploaduser(Request $repD){
        $newUser = new member;
        $newUser->name=$repD->name;
        $newUser->email=$repD->email;
        $newUser->address=$repD->address;
        return $result = $newUser->save();
            // if($result){
            //     return redirect('api/apiTest')->with('return_msg','Data Has Been Saved..');
            // } else {
            //     return redirect('api/apiTest')->with('return_msg','Upload Failed..!!');
            // }
    }

    function viewUser($Uid=null){
        return $editData = member::find($Uid);
        //return $Uid?view('apiUpdate',['Edata'=>$editData]):redirect('api/apiTest');
    } 
    function deleteUser($Did=null){
    return $deleteResult = $Did?member::where('id',$Did)->delete():redirect('api/apiTest');
    // if($deleteResult){
    //         return redirect('api/apiTest')->with('return_msg','Delete Successful..');
    //     } else {
    //         return redirect('api/apiTest')->with('return_msg','Delete Failed..!!');
    //     }
    }

    function updateData(Request $req){
        $UserU = member::find($req->id);
        $UserU->name=$req->name;
        $UserU->email=$req->email;
        $UserU->address=$req->address;
        return $outPut = $UserU->save();
        // if($outPut){
        //     return redirect('api/apiTest')->with('return_msg','Data has been Updated..');
        // } else {
        //     return redirect('api/apiTest')->with('return_msg','Updated Failed..!!');
        // }
    }

    function srearchData($str=null){
        return $collection=member::where('name',"LIKE","%".$str."%")->orWhere('email','LIKE','%'.$str.'%')->get();
        // return $str?view('apiSearchView',[
        //     'Searchdata'=>$collection,
        //     'i'=>1
        //     ]):redirect('api/apiTest');
    }
    
    function valieData(Request $inp){
        $rules=array(
            'name' => 'required | max:10',
        );
        $validator = Validator::make($inp->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        } else {
            return $inp->input();
        }
         
    }
  
    
}

