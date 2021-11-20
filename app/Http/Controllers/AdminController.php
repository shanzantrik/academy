<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Admin;
use Auth;
use Redirect;
use App\Application;
use App\Semester;
use App\Mesg;
use App\Payment;
use PDF;
use Mail;
class AdminController extends Controller
{
    public function viewApplications(){
        $applications = Application::all();
        return view('dashboard.index',compact('applications'));
    }

    public function approvedApplications(){
        $applications = Application::where('status','1')->get();
        return view('dashboard.index',compact('applications'));
    }

    public function rejectedApplications(){
        $applications = Application::where('status','2')->get();
        return view('dashboard.index',compact('applications'));
    }
    
    public function viewSingleApplication($id){
        $application = Application::find($id);
        if($application){
            return view('dashboard.view',compact('application'));
        }
        else{
            return Redirect::back()->with('error','Invalid Request');
        }
    }
    
    public function pdfView($id){
        $application = Application::find($id);
        if($application){
            $pdf = PDF::loadView('dashboard.pdf', compact('application'));
            return $pdf->download('application.pdf');
        }
        else{
            return Redirect::back()->with('error','Invalid Request');
        }
    }
    
    public function index(){
    	return view('admin.dashboard');
    }

    public function adminLogin(){
    	if(!Auth::check()){
    	return view('admin.login');
    	}
    	else{
            if(Auth::user()->role=="admin"){
              return redirect('/admin/dashboard')->with('error','Already Logged In');  
            }
            else{
              return redirect('/')->with('error','Already Logged In');
            }
    	}
    }

    public function authenticateAdmin(Request $request){
     $this->validate($request, ['password' => 'required', ]);

        $username = $request->username; //the input field has name='username' in form
        $password = $request->password;

        if (filter_var($username, FILTER_VALIDATE_EMAIL))
        {
            //user sent their email
            Auth::attempt(['email' => $username, 'password' => $password, 'role' => 'admin']);
        }
        else
        {
            //they sent their username instead
            Auth::attempt(['mobile' => $username, 'password' => $password, 'role' => 'admin']);
        }
        //was any of those correct ?
        if (Auth::check())
        {
           return redirect('/admin/dashboard')
                    ->with('success', 'Logged In Successfully');
        }
        //Nope, something wrong during authentication
        return Redirect::back()
            ->with('error', 'Invalid Credentails');
    }

    public function updateApplication($id,Request $request){
             $application  = Application::find($id);
             $user = User::find($application->user_id);
             
             if($request->status=="1" && $application->status=="2"){
                $msgtxt = "Your%20application%20has%20been%20accepted%20Please%20make%20the%20payment%20Reimalie%20Academy";
                $msg = new Mesg();
                $msg->sendMessage($user->mobile, $msgtxt);
                
                $email = $user->email;
                $text = "";
                $text .= "<h1> Your Application has been accepted. Please make the payment Reimalie Academy </h1>";
                Mail::send([], [], function ($message) use ($text,$email){
                $message->to($email)
                ->subject("Application Status")
                ->setBody($text, 'text/html'); 
               });
                
             }

             if($request->status=="2" && $application->status=="1"){
                $msgtxt = "Your%20application%20has%20been%20rejected%20Please%20refill%20the%20application%20Reimalie%20Academy";
                $msg = new Mesg();
                $msg->sendMessage($user->mobile, $msgtxt);
                
                $email = $user->email;
                $text = "";
                $text .= "<h1> Your Application has been rejected. Please refill the application. Reimalie Academy </h1>";
                Mail::send([], [], function ($message) use ($text,$email){
                $message->to($email)
                ->subject("Application Status")
                ->setBody($text, 'text/html'); 
               });
               
             }
             
             if($application && $user){
             $application->course_name = $request->course_name;
             $application->current_sem = $request->current_sem;
             $application->department_name = $request->department_name;
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
             $application->status = $request->status;
             $application->moderator_id = Auth::user()->id;
        
             
             if($request->title !=NULL && $request->amount!=NULL){
             $sem = new Semester();
             $sem->is_custom = Auth::user()->id;
             $sem->user_id = $user->id;
             $sem->title = $request->title;
             $sem->amount = $request->amount;
             $sem->save();
             }
              $application->save();
              return Redirect::back()->with('success','Application updated Successfully');
             } 
             else{
                return Redirect::back()->with('error','Invalid Request. Please try again');
             }
    }

    public function updatePayment(Request $request){
        $user = User::where('email',$request->email)->first();
        $sem = Semester::find($request->semester_id);
        if($user && $sem){
         $payment = Payment::where('semester_id',$request->semester_id)->where('user_id',$user->id)->first();
         if($payment){
           return Redirect::back()->with('error','Payment Already done for selected installment');
         }
         else{
           $payment = new Payment();
           $payment->user_id = $user->id;
           $payment->trx_id = "Approved By ".Auth::user()->name;
           $payment->amount = $sem->amount;
           $payment->semester_id = $request->semester_id;
           $payment->save();
           return Redirect::back()->with('success','Payment added Successfully');
         }
        }
        else{
           return Redirect::back()->with('error','Student not found');
        }
    }
}
