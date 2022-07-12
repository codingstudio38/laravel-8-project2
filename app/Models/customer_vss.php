<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_vss extends Model
{
    use HasFactory;
     public $table="customer_vss";
     function getNameAttribute($value){
        return ucfirst($value);
    }
    function getPhoneAttribute($value){
        return "+91-".$value." IND";
    }
    public function setNameAttribute($value){
        return $this->attributes['name']='Mr. '.$value;
    }
    public function setPhoneAttribute($value){
        return $this->attributes['phone']='+91- '.$value;
    }
}
 