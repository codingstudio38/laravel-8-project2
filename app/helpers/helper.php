<?php
use App\Models\multiphoto;

if(!function_exists('counter')){
    function counter($data)
    {
      $user = multiphoto::where('contentid',$data)->get();
       return $user->count();
       
    }
} else {
 return 'function not exists..!!';
}
///composer dump-autoload

?>