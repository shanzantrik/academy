<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use PDF;
use App\Payment;
use App\Application;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function verify(){
        if(Auth::check()){
            if(!Auth::user()->status){
                $page_title = "Verify";
                return view('pages.verify',compact('page_title'));
            }
            else{
                return redirect('/home')->with('error','Mobile Number Already Verified');
            }
        }
        else{
                return redirect('/login')->with('success','Please Login to continue');
        }
    }
    
    public function pdf($id){
        $payment = Payment::where('id',$id)->where('user_id',Auth::user()->id)->first();
        if($payment){
            $pdf = PDF::loadView('dashboard.receipt', compact('payment'));
            return $pdf->download('receipt.pdf');
        }
        else{
            return Redirect::back()->with('error','Invalid Request');
        }
    }
    
     public function pdfView(){
        $id = Auth::user()->id;
        $application = Application::find($id);
        if($application){
            $pdf = PDF::loadView('dashboard.pdf', compact('application'));
            return $pdf->download('application.pdf');
        }
        else{
            return Redirect::back()->with('error','Invalid Request');
        }
    }
}
