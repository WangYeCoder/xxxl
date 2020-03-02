<?php

namespace App\Http\Controllers;

use App\Work\CookieHandle;
use Illuminate\Http\Request;

class tlbbController extends Controller
{
    //
   public function index()
   {
       # code...
       $cookHandle = new CookieHandle();
        $cookHandle->dostart();
   }
}
