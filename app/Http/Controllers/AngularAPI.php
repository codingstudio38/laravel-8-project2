<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\angularUser_tbl;
class AngularAPI extends Controller
{
    public function addAngular_data(Request $req){
        return $req; exit;
                $newUser = new angularUser_tbl; 
                $newUser->name=$req->name;
                $newUser->email=$req->email;
                $newUser->password=$req->password;
                $result = $newUser->save();
                $last_id = $newUser->id;
             if($result){ 
                    return response()->json([
                    'last_id' =>$last_id,
                    'status_code' => 200,
                    'massage' => 'Create Successfully..',
                    ]);
                } else {
                    return response()->json([
                    'status_code' => 400,
                    'massage' => 'Failed To Upload..',
                    ]);
                }
                
    }  
    public function viewAngular_data(){
            $angulardata = angularUser_tbl::orderBy('id', 'DESC')->get(); 
            if($angulardata){
                    return response()->json([
                    'Alldata' =>$angulardata,
                    'status_code' => 200,
                    'massage' => 'Records Successfully Fatched..',
                    ]);
                } else {
                    return response()->json([
                    'status_code' => 400,
                    'massage' => 'Failed To Fatched..',
                    ]);
                }
                
    } 
}
 