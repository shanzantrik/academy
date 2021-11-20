<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use Redirect;

class InstallmentController extends Controller
{
    public function index(){
    	$installments = Semester::all();
    	return view('dashboard.installments',compact('installments'));
    }

    public function create(Request $request){
    	$this->validate($request, [
          'installment_name' => 'required|unique:semesters,title',
        ]);

        $installment = new Semester();
        $installment->title = $request->installment_name;
        $installment->amount = $request->amount;
        $installment->save();

        return Redirect::back()->with('success','Installment added successfully');

    }

    public function edit($id,Request $request){
        $installment = Semester::find($id);
        if($installment){
    	if($request->installment_name != $installment->title){
    		$this->validate($request, [
             'installment_name' => 'required|unique:semesters,title',
            ]);
    	}
        $installment->title = $request->installment_name;
        $installment->amount = $request->amount;
        $installment->save();
        return Redirect::back()->with('success','Installment Updated successfully');
        }
        else{
        return Redirect::back()->with('error','Invalid request please try again');
        }

    }
}
