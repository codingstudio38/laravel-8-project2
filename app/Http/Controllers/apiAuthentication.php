<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class apiAuthentication extends Controller
{
        function Authregister(Request $request){
            $request->input();
            $data = Validator::make($request->all(),[
                'name'=>'required|string|max:190',
                'email'=>'required|email|max:190|unique:users,email',
                'password'=>'required|max:20',
            ]);
            if($data->fails()){
            return response()->json(['status_code' => 400,'massage' => 'Bad Request']);
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
                        'massage' => 'Failed To Created User ..',
                ]);
            }
            
        }

        function Authlogin(Request $request){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validator->fails()){
            return response()->json(['status_code' => 400,'massage' => 'Bad Request']);
            }
            $credentials = request(['email','password']);
                if(!Auth::attempt($credentials)){
                return response()->json([
                    'status_code' => 500,
                    'massage' => 'Unaithorized'
                ]);
            }

            $user= User::where('email', $request->email)->first();
            // if (!$user || !Hash::check($request->password, $user->password)) {
            //     return response([
            //         'message' => ['These credentials do not match our records.']
            //     ], 404);
            // }
            $token = $user->createToken('my-app-token')->plainTextToken;
            return $response = [
                    'user' => $user,
                    'status_code' => 200,
                    'token' => $token
                ];

        }  
  
        function Authlogout(Request $request){
            $request->user()->currentAccessToken()->delete();
            //auth()->user()->tokens()->delete();
            return response(['status_code' => 500,'massage'=>'Logout Successfully...']);

        }
 
    

} 
