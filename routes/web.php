<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\httpuser;
use App\Http\Controllers\userForm;
use App\Http\Controllers\sessionLoginCon;
use App\Http\Controllers\flashsess;
use App\Http\Controllers\uploadfile;
use App\Http\Controllers\PaginationCon;
use App\Http\Controllers\QueryBuilderCon;
use App\Http\Controllers\aggregateCon;
use App\Http\Controllers\DbJoinCon;
use App\Http\Controllers\accessors;
use App\Http\Controllers\mutator;
use App\Http\Controllers\oneTooneRelation;
use Illuminate\Support\Str;
use App\Http\Controllers\RouteModelBinding;
use App\Mail\SampleMail;
use App\Http\controllers\apiAuthentication; 
use App\Http\controllers\multiDatabase; 
use App\Http\controllers\GetApidata; 
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post("Users", [UsersController::class, 'getData']);
Route::view("login", 'users');
Route::view("home", 'home'); 
Route::view("noaccess", 'noaccess');

Route::group(['middleware' => ['protectPage']], function () {
    Route::view("users", 'users');
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::view("home1", 'home1');
Route::view("users1", 'users1')->middleware('protectPage1');
Route::view("noaccess1", 'noaccess1');

Route::get("dbUsers", [UsersController::class, 'directconnection']);

Route::get("modelconnection", [UsersController::class, 'modelconnection']);

Route::get("httpuser", [httpuser::class, 'viewhttpdata']);


Route::put("FormSubmit", [userForm::class, 'testRequest']);
Route::view("httpSubmit", 'userdataVIEW');


 
Route::post("datastore", [flashsess::class, 'storeMember']);
Route::view('flashSession', 'flashSession'); 


// file upload start
Route::post("upload", [uploadfile::class, 'uploadFILE']);

Route::get('fileUploadd', function () {
    return view('fileUpload', ["Smsg" => ""]);
});


// localization start
Route::get('/profilePage/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('profile');
});
 

// session login start
Route::post("LoginCon", [sessionLoginCon::class, 'userlogin']);
Route::get("sessionProfile",[sessionLoginCon::class, 'checkSessionData']);
Route::get("logout",[sessionLoginCon::class, 'LogoutSession']);
Route::get("sessionLogin",[sessionLoginCon::class, 'sessionLogin']);
// flash session login start
Route::get("chechkdata",[PaginationCon::class, 'chechkdata']);
 
   
 
//data view add edit delete stat
Route::group(['middleware'=>'web'],function(){ 
  
Route::get("PaginatLogin",[PaginationCon::class, 'PaginatLogin']);
Route::get("Paginatlogout", [PaginationCon::class, 'Paginatlogout']);    
Route::post("PaginatLoginCon", [PaginationCon::class, 'PaginatLoginCon']);
Route::get("PaginationDataFatch", [PaginationCon::class, 'DataFatch']);
Route::post("InsertData", [PaginationCon::class, 'addData']);
Route::get("delete/{id}", [PaginationCon::class, 'Datadelete']);
Route::get("edit/{id}", [PaginationCon::class, 'Dataedit']);
Route::post("Update", [PaginationCon::class, 'Update']);
   
Route::get("PaginationMrow", [PaginationCon::class, 'PaginationMrow']);
Route::post("PaginationMrowInsert", [PaginationCon::class, 'multirowInsert']);
Route::delete("/multidelete", [PaginationCon::class, 'multidelete'])->name('multidelete');
Route::post("/MultiDataview", [PaginationCon::class, 'EditMultiDataview'])->name('MultiDataview');
Route::post("/UpdateMultiDataview", [PaginationCon::class, 'updateMultiData'])->name('UpdateMultiDataview');
Route::get("viewPhotoPage", [PaginationCon::class, 'viewmultiPhotoPage']); 
Route::post("uploadMultiFiles", [PaginationCon::class, 'InertmultiPhoto']);
Route::get("getSelectids", [PaginationCon::class, 'getSelectids']);

//  guzzlehttp
Route::get("apiget", [GetApidata::class, 'index']);
Route::post("apiregister", [GetApidata::class, 'apiregister']);
Route::post("apilogin", [GetApidata::class, 'apilogin']);
Route::get("getapidata", [GetApidata::class, 'getapidata']);
Route::post("logpotapidata", [GetApidata::class, 'logpotapidata']);
//  guzzlehttp

Route::post("xlimport", [PaginationCon::class, 'importForm']);
Route::get("xlexport", [PaginationCon::class, 'exportUsersXl']);
Route::get("csvexport", [PaginationCon::class, 'exportUsersCSV']); 
Route::get("pdfexport", [PaginationCon::class, 'exportUsersPDF']); 
 
}); 





//angular data inser,add,delete,view start

Route::get("addangularData",[PaginationCon::class, 'addAngular_data']);
Route::get("viewangularData",[PaginationCon::class, 'viewAngular_data']);


//angular data inser,add,delete,view end








//data  edit delete end


//Query Builder start
Route::get('QueryBuilder', [QueryBuilderCon::class, 'opertion']);
//Query Builder end 

//Aggregate methods start
Route::get('Aggregate', [aggregateCon::class, 'opertion']);
//Aggregate methods end 

//Db Join controller start
Route::get('DbJoin', [DbJoinCon::class, 'checkOperation']);
//Db Join controller end 

//Accessors controller start
Route::get('Accessors', [accessors::class, 'index']);
//Accessors controller end 



//Mutator controller start
Route::get('Mutator', [mutator::class, 'index']);
//Mutator controller end 

//one To oneRelation controller start
Route::get('oneTooneRelation', [oneTooneRelation::class, 'index']);
//one To oneRelation controller end 

//one To many Relation controller start
Route::get('oneTomanydata', [oneTooneRelation::class, 'manydata']);
//one To many Relation controller end 



//Fluent Strings controller start

//$info="ok.. let's start";
// $info_UpperFirst=Str::ucfirst($info);
// $info_replave=Str::replaceFirst("Ok", "Hello", $info_UpperFirst);
// $info_UpperAll=Str::camel($info_replave);

// $info_all=Str::of($info)
// ->ucfirst($info)
// ->replaceFirst("Ok", "Hello", $info)
// ->camel($info);

// echo  $info_all;
//Fluent Strings controller end


// Route Model Binding controller start
Route::get('RouteModelBinding/{key:name}', [RouteModelBinding::class, 'index']);
// Route Model Binding controller end


// Markdown Mail Template controller start
Route::get('email', function (){
    return new SampleMail();
});
//https://laravel.com/docs/8.x/mail#markdown-mailables
//php artisan make:mail OrderShipped --markdown=emails.orders.shipped
// Markdown Mail Template controller end




//api Authorization login Controller start
Route::view("apiauthLogin",'apiauthLogin');
//api Authorization login Controller wnd


// multiples database connection
Route::get('multiDatabase', [multiDatabase::class, 'index']);
