<?php

namespace App\Http\Controllers;

use App\Work\Ebbinghaus;
use Illuminate\Http\Request;

class EbbinghausController extends Controller
{
    //
    public function index()
    {
        $work = new Ebbinghaus();
        $list=30;
        $work->newTable($list);
    }
}
