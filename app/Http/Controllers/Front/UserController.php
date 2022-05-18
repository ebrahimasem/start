<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController{

 public function srhowUse(){

     return "Hello users this";
 }
 public function getIndex(){
//   $obj = new \stdClass();
//   $obj->name='asem';
//   $obj->gender='male';
//   $obj->age=25;
$data =['ebrahim','male'];
     return view('welcome',compact('data'));
 }

}

