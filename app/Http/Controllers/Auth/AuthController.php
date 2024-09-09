<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        // return login view
        return view('auth.login');
    }
    public function handleLogin(Request $request){
        // handle requsest from login
        $data=$request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        // Auth::attempt => check => if exists => login
        $isLogin=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$isLogin){
            return redirect()->route('login')->with('msg','not valid email or password');
        }
        if(Auth::user()->role == 'user'){
            return redirect()->route('home');
        }
        return redirect()->route('admin.home');
    }
    public function register(){
        return view('auth.register');
    }
    public function handleRegister(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        // 12345678
        $data['password']=Hash::make($request->password); //$##DGHT
        $user=User::create($data);
        Auth::login($user);
        return redirect()->route('admin.home');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
