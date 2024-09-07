<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data=['fname'=>'ali','lname'=>'ahmed','email'=>'ali@gmail'];
        return view('home',compact('data'));
        //return view('home',['username'=>$username,'email'=>$email]);
    }
}
