<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Course;
use Redirect;

class DepartmentController extends Controller
{
    public function index(){
    	$departments = Department::all();
    	$courses = Course::all();
    	return view('dashboard.departments',compact('departments','courses'));
    }

    public function create(Request $request){
    	$this->validate($request, [
          'department_name' => 'required|unique:departments,name',
          'course_id' => 'required|exists:courses,id',
        ]);

        $department = new Department();
        $department->name = $request->department_name;
        $department->course_id = $request->course_id;
        $department->save();
        return Redirect::back()->with('success','department added successfully');

    }

    public function edit($id,Request $request){
        $department = Department::find($id);
        if($department){
    	if($request->department_name != $department->name){
    		$this->validate($request, [
             'department_name' => 'required|unique:courses,name',
             'course_id' => 'required|exists:courses,id',
            ]);
    	}
    	else{
    		$this->validate($request, [
            'department_name' => 'required',
            'course_id' => 'required|exists:courses,id',
            ]);
    	}
        $department->name = $request->department_name;
        $department->course_id = $request->course_id;
        $department->save();

        return Redirect::back()->with('success','department Updated successfully');
        }
        else{
        return Redirect::back()->with('error','Invalid request please try again');
        }

    }
    
    public function destroy($id){
        $department = Department::find($id);
        $department->delete();
        return Redirect::back()->with('success','Department Deleted successfully');
    }
}
