<?php

namespace App\Http\Controllers\second;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class SecondController extends BaseController
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function showcontroll(){
        return "static string";
    }
}
