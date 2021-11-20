<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Application;
use App\User;
use Auth;
use Redirect;

class ApplicationController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        'signature' => 'image|mimes:jpeg,png,jpg|max:2048',
    ]);
    
        $ac = Application::count();
        if(Auth::check()){
         //Application 
         $application = Application::where('user_id',Auth::user()->id)->get();
         if(!$application->count()>0){
             
             $application  = new Application();
             $application->user_id = Auth::user()->id;
             $application->course_name = $request->course_name;
             $application->roll_no = "20200".$ac+1;
             $application->current_sem = $request->current_sem;
             $application->department_name = $request->department_name;
             $application->session = $request->session;
             $application->batch_no = $request->batch_no;
             $application->enrollment_no = $request->enrollment_no;
             $application->name = $request->name;
             $application->father_name = $request->father_name;
             $application->mother_name = $request->mother_name;
             $application->guardian_name = $request->guardian_name;
             $application->date_of_birth = $request->date_of_birth;
             $application->address = $request->address;
             $application->contact_number = $request->contact_number;
             $application->landline = $request->landline;
             $application->mobile = $request->mobile;
             $application->email = $request->email;
             $application->education_qualification = $request->education_qualification;
             $application->last_course = $request->last_course;
             $application->marks_secured = $request->marks_secured;
             $application->cgpa = $request->cgpa;
             $application->percentage = $request->percentage;
             $application->division = $request->division;
             $application->grade = $request->grade;
             
             if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $photo = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path('/public_html/images/photo/');
                $image->move($destinationPath, $photo);
                $application->photo = $photo;
               
             }
             
              if ($request->hasFile('signature')) {
                $image = $request->file('signature');
                $signature = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path('/public_html/images/sign/');
                $image->move($destinationPath, $signature);
                $application->signature = $signature;
             }
             
             $application->save();
             return redirect('/home')->with('success','Application Submitted Successfully');
         }
         else{
             return Redirect::back()->with('error','Application Already Submitted');
         }
        }
        else{
            return Redirect::back();
        }
    }

    public function editApplication($id){
        $application = Application::where('id',$id)->where('user_id',Auth::user()->id)->first();
        if($application){
           return view('edit',compact('application'));
        }
        else{
            return Redirect::back()->with('error','Invalid Request. Please try again');
        }
    }

    public function postEdit($id,Request $request){
       
        $application = Application::where('id',$id)->where('user_id',Auth::user()->id)->first();
        if($application){
             $application->course_name = $request->course_name;
             $application->department_name = $request->department_name;
             $application->current_sem = $request->current_sem;
             $application->session = $request->session;
             $application->batch_no = $request->batch_no;
             $application->enrollment_no = $request->enrollment_no;
             $application->roll_no = $request->roll_no;
             $application->name = $request->name;
             $application->father_name = $request->father_name;
             $application->mother_name = $request->mother_name;
             $application->guardian_name = $request->guardian_name;
             $application->date_of_birth = $request->date_of_birth;
             $application->address = $request->address;
             $application->contact_number = $request->contact_number;
             $application->landline = $request->landline;
             $application->mobile = $request->mobile;
             $application->email = $request->email;
             $application->education_qualification = $request->education_qualification;
             $application->last_course = $request->last_course;
             $application->marks_secured = $request->marks_secured;
             $application->cgpa = $request->cgpa;
             $application->percentage = $request->percentage;
             $application->division = $request->division;
             $application->grade = $request->grade;
             $application->status = '0';
             $application->save();

             if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $photo = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path('/public_html/images/photo/');
                $image->move($destinationPath, $photo);
                $application->photo = $photo;
               
             }

              if ($request->hasFile('signature')) {
                $image = $request->file('signature');
                $signature = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path('/public_html/images/sign/');
                $image->move($destinationPath, $signature);
                $application->signature = $signature;
             }
            return redirect('/home')->with('success','Application Updated Successfully');

        }
        else{
            return Redirect::back()->with('error','Invalid Request. Please try again');
        }
    }
}
