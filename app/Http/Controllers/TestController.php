<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test1(){
        return view('test1');
    }

    public function test2($x){
        return "test2 $x";
    }
}
