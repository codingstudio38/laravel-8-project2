<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    public $timestamps=false;
    function companyData(){
        return $this->hasOne('App\Models\newcompany');
    }
    function companyDatasss(){
        return $this->hasMany('App\Models\newcompany');
    }
    function getAddressAttribute($value){
        return $value." - IND";
    }
}    
