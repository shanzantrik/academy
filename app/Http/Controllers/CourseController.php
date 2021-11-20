<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Redirect;

class CourseController extends Controller
{
    public function index(){
    	$courses = Course::all();
    	return view('dashboard.courses',compact('courses'));
    }

    public function create(Request $request){
    	$this->validate($request, [
          'course_name' => 'required|unique:courses,name',
        ]);

        $course = new Course();
        $course->name = $request->course_name;
        $course->save();

        return Redirect::back()->with('success','Course added successfully');

    }

    public function edit($id,Request $request){
        $course = Course::find($id);
        if($course){
    	if($request->course_name != $course->name){
    		$this->validate($request, [
             'course_name' => 'required|unique:courses,name',
            ]);
    	}
        $course->name = $request->course_name;
        $course->save();
        return Redirect::back()->with('success','Course Updated successfully');
        }
        else{
        return Redirect::back()->with('error','Invalid request please try again');
        }

    }
    
    public function destroy($id){
        $course = Course::find($id);
        $course->delete();
        return Redirect::back()->with('success','Course Deleted successfully');
        
    }
}
