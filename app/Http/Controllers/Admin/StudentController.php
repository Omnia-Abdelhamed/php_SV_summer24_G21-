<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students=Student::get(); // select * from students
        return view('admin.students.index',compact('students'));
    }
    public function create(){
        $departments=Department::get();
        return view('admin.students.create',compact('departments'));
    }
    public function store(StudentRequest $request){ // name, email, phone, department

        $data=$request->validated();
        Student::create($data);
        return redirect()->back()->with('msg','Added..');
    }

    public function edit($id){
        $departments=Department::get();
        $student=Student::findorfail($id);
        return view('admin.students.edit',compact('departments','student'));
    }
    public function update(StudentRequest $request,$id){ // name, email, phone, department

        $data=$request->validated();
        $student=Student::findorfail($id);
        $student->update($data);
        return redirect()->back()->with('msg','Updated..');
    }

    public function show($id){
        return Student::findorfail($id);
    }

    public function destroy($id){
        $student=Student::findorfail($id);
        $student->delete();
        return redirect()->back()->with('msg','Deleted..');
    }
}
