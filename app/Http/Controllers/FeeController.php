<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Fee;
use Redirect;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(){
    	$courses = Course::all();
    	$categories = Category::all();
    	return view('dashboard.categories',compact('courses','categories'));
    }

    public function create(Request $request){
    	$this->validate($request, [
          'category_name' => 'required|unique:categories,name',
          'course_id' => 'required|exists:courses,id',
        ]);

        $department = new Category();
        $department->name = $request->category_name;
        $department->course_id = $request->course_id;
        $department->save();
        return Redirect::back()->with('success','Fee Category added successfully');

    }

    public function edit($id,Request $request){
        $department = Category::find($id);
        if($department){
    	if($request->category_name != $department->name){
    		$this->validate($request, [
             'category_name' => 'required|unique:categories,name',
             'course_id' => 'required|exists:courses,id',
            ]);
    	}
    	else{
    		$this->validate($request, [
            'category_name' => 'required',
            'course_id' => 'required|exists:courses,id',
            ]);
    	}
        $department->name = $request->category_name;
        $department->course_id = $request->course_id;
        $department->save();

        return Redirect::back()->with('success','Fee Category Updated successfully');
        }
        else{
        return Redirect::back()->with('error','Invalid request please try again');
        }

    }
    
}
