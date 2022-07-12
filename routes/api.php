<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api;
use App\Http\Controllers\apiResource;
use App\Http\controllers\apiAuthentication; 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// }); 
  
Route::group(['middleware'=>['auth:sanctum']], function(){
 //api Controller start 
Route::get("apiTest",[api::class,'getData']);
Route::post("upload",[api::class,'uploaduser']);
Route::get("deleteUser/{Did?}",[api::class,'deleteUser']);
Route::get("viewEdit/{Uid?}",[api::class,'viewUser']);
Route::post("update",[api::class,'updateData']);
Route::get("srearch/{str?}",[api::class,'srearchData']);
Route::post("validate",[api::class,'valieData']); 
//api Controller end
  
  
//api Resource Controller start
Route::apiResource("apiresource",apiResource::class);
//api Resource Controller end   
Route::post("apiAuthlogout",[api::class,'Authlogout']);
});
 
  
 //api Controller start
// Route::get("apiTest",[api::class,'getData']);
// Route::post("upload",[api::class,'uploaduser']);
// Route::get("deleteUser/{Did?}",[api::class,'deleteUser']);
// Route::get("viewEdit/{Uid?}",[api::class,'viewUser']);
// Route::post("update",[api::class,'updateData']);
// Route::get("srearch/{str?}",[api::class,'srearchData']);
// Route::post("validate",[api::class,'valieData']); 
//api Controller end

//api Authentication Controller start
Route::view("loginView",'apiauthLogin');
Route::post("apiAuthLogin",[api::class,'Authlogin']);
//Route::post("apiregister",[apiAuthentication::class,'Authregister']);
Route::post("Authregister",[api::class,'Authregister']);
//api Authentication Controller end

 


?>
  
