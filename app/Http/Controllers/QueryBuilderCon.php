<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderCon extends Controller
{
    function opertion(){ 
        //insert
        // return DB::table('customer_vss')->insert([
        //     'email'=>"Test email",
        //     'phone'=>"Test phone",
        //     'name'=>"Test vidyut",
        //     'updated_at'=>'e',
        //     'created_at'=>'e',
        // ]);
        //update
        // return DB::table('customer_vss')->where('id',"1")->update([
        //     'email'=>"Test email",
        //     'phone'=>"Test phone",
        //     'name'=>"Test vidyut",
        //     'updated_at'=>'e',
        //     'created_at'=>'e',
        // ]);
        //delete
        //return DB::table('customer_vss')->where('id',"1")->delete();
        //count
        //return DB::table('customer_vss')->count();
        //find
        //return (array)DB::table('customer_vss')->find(1);
        //where 
        //return DB::table('customer_vss')->where('id',"1")->get();
        //db data connetoin
        $data= DB::table('customer_vss')->get();
        return view('QueryBuilderViewPage',['dataCol'=>$data]);
    }
}
