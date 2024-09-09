<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;

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
        if($request->hasFile('photo')){
            $photoName=$request->file('photo')->getClientOriginalName();
            $photo=$request->file('photo')->storeAs('images',$photoName); //tmp , move_uploaded_files
            $data['photo']=$photo;
        }
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
        if(!empty($student->photo) && Storage::exists($student->photo)){
            Storage::delete($student->photo);
            if(empty(Storage::files('images'))){
                Storage::deleteDirectory('images');
            }
        }
        $student->delete();
        return redirect()->back()->with('msg','Deleted..');
    }
}
