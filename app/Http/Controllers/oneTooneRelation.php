<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Models\newcompany;
class oneTooneRelation extends Controller
{
    // 
    function index(){
     return member::find(2)->companyData;
    } 
    function manydata(){
     return member::find(2)->companyDatasss;
    }  
} 
 