<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.students.index');
    }
    public function create(){
        return view('admin.students.create');
    }
}
