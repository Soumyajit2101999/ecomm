<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    function master(){
        $data = 20;
        return view('backend.master',['data'=>$data]);
    }
}
