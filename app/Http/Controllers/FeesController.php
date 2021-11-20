<?php

namespace App\Http\Controllers;
use App\Category;
use App\Course;
use App\Fee;
use Redirect;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function index(){
    	$fees = Fee::all();
    	$categories = Category::all();
    	return view('dashboard.fee',compact('fees','categories'));
    }

    public function create(Request $request){
    	$this->validate($request, [
          'title' => 'required|unique:fees,title',
          'category_id' => 'required|exists:categories,id',
          'amount'=>'required',
        ]);

        $fee = new Fee();
        $fee->title = $request->title;
        $fee->amount = $request->amount;
        $fee->category_id = $request->category_id;
        $fee->save();
        return Redirect::back()->with('success','Fee added successfully');

    }

    public function edit($id,Request $request){
        $fee = Fee::find($id);
        if($fee){
    	if($request->title != $fee->title){
    		$this->validate($request, [
             'title' => 'required|unique:fees,title',
             'category_id' => 'required|exists:categories,id',
             'amount'=>'required',
            ]);
    	}
    	else{
    		$this->validate($request, [
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'amount'=>'required',
            ]);
    	}
        $fee->title = $request->title;
        $fee->category_id = $request->category_id;
        $fee->amount = $request->amount;
        $fee->save();

        return Redirect::back()->with('success','Fee Updated successfully');
        }
        else{
        return Redirect::back()->with('error','Invalid request please try again');
        }

    }
}
