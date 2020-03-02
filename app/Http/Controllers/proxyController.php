<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proxyController extends Controller
{
    //维护代理池任务
    public function getproxy()
    {
        # code...
        $proxyUrl = "118.25.45.211";
        $proxyPort = 2587;

        $proxy = [
            'ip'=>$proxyUrl,
            'port'=>$proxyPort
        ];

    
    }
    
}
