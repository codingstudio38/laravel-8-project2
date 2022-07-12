<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tbl_users extends Model
{
    use HasFactory;
    public $timestamps=false;
    function getNameAttribute($value){
        return ucfirst($value);
    }
    function getAddressAttribute($value){
        return $value." IND";
    }   
    // function companyData(){
    //     return $this->hasOne('App\Models\company');
        
    // }
  
    protected $fillable = ['name','email','address','files'];
    
    public static function getUsers(){ 
        $records = DB::table('tbl_users')->select('id','name','email','address','files')->get()->toArray();
        return $records;
    }
}

?>