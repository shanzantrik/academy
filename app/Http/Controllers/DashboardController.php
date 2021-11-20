<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Admin;
use Auth;
use Redirect;

class DashboardController extends Controller
{
    public function index(){
    	return view('dashboard.dashboard');
    }

    public function adminLogin(){
    	if(!Auth::check()){
    	return view('dashboard.login');
    	}
    	else{
            if(Auth::user()->role=="admin"){
              return redirect('/dashboard')->with('error','Already Logged In');  
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
           return redirect('/dashboard')
                    ->with('success', 'Logged In Successfully');
        }
        //Nope, something wrong during authentication
        return Redirect::back()
            ->with('error', 'Invalid Credentails');
    }
}
