<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Redirect;
use Carbon\Carbon;
use App\Mesg;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login()
    {
        $page_title = "Login";
        return view('pages.login', compact('page_title'));
    }

    public function register()
    {
        $page_title = "Register";
        return view('pages.register', compact('page_title'));
    }

    public function postRegister(Request $request)
    {

        $this->validate($request, [
         'mobile' => 'required|max:10|min:10|unique:users,mobile',
         'email' => 'required|email|unique:users,email|max:190', 
         'name' => 'required|min:4|max:32', 
         'password' => 'required|confirmed|min:4|max:190', ]
        );
	$toemail = $request->email;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile = $request->mobile;
        $user->save();

        $otp = $this->generateOTP();
        $msgtxt = 'Your%20verification%20code%20is%20' . $otp;
        $user->otp = $otp;
        $current = Carbon::now();
        $user->otp_time = $current->addMinutes(5);
        $user->save();

        $msg = new Mesg();
        $msg->sendMessage($user->mobile, $msgtxt);

	$html = "Your OTP is - ".$otp;
	Mail::send(array(), array(), function ($message) use ($toemail,$html) {
	  $message->to($toemail)
	    ->subject('REIMALIE ACADEMY COLLEGE')
	    ->from('info@reimallieacademy.com')
	    ->setBody($html, 'text/html');
	});

        Auth::login($user);
        return redirect('/verify')->with('success', 'Registration Successfull.');
    }

    public function generateOTP()
    {
        $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0;$i < 6;$i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1) ];
        }
        return $randomString;
    }

    function generateRandomString()
    {
        $length = 14;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0;$i < $length;$i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1) ];
        }
        $check = User::where('wallet_address', $randomString)->first();
        if ($check)
        {
            $this->generateRandomString();
        }
        else
        {
            return $randomString;
        }
    }

    public function postVerify(Request $request)
    {
        $this->validate($request, ['otp' => 'required|max:6|min:6', ]);
        if (Auth::check())
        {
            $user = User::where('mobile', Auth::user()->mobile)
                ->where('status', '0')
                ->first();

            if ($user)
            {
                $otp = $request->otp;
                $time = $user->otp_time;
                if (strtotime($time) >= strtotime(Carbon::now()))
                {
                    if ($otp == $user->otp)
                    {
                        $user->status = "1";
                        $user->save();
                        return redirect('home')
                            ->with('success', 'Mobile Number Verified Successfully');
                    }
                    else
                    {
                        return Redirect::back()
                            ->with('error', 'Incorrect OTP');
                    }
                }
                else
                {
                    return Redirect::back()
                        ->with('error', 'OTP Expired');
                }
            }
            else
            {
                return Redirect::back()
                    ->with('error', 'Invalid Request');

            }
        }
        else
        {
            return Redirect::back()
                ->with('error', 'Oops Error Occurred');

        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, ['password' => 'required', ]);

        $username = $request->username; //the input field has name='username' in form
        $password = $request->password;

        if (filter_var($username, FILTER_VALIDATE_EMAIL))
        {
            //user sent their email
            Auth::attempt(['email' => $username, 'password' => $password, 'role' => 'user']);
        }
        else
        {
            //they sent their username instead
            Auth::attempt(['mobile' => $username, 'password' => $password, 'role' => 'user']);
        }
        //was any of those correct ?
        if (Auth::check())
        {
            //send them where they are going
            if (Auth::user()->status)
            {
                return redirect('/home')
                    ->with('success', 'Logged In Successfully');
            }
            else
            {
                return redirect('/verify')
                    ->with('success', 'Logged In Successfully');
            }
        }
        //Nope, something wrong during authentication
        return Redirect::back()
            ->with('error', 'Invalid Credentails');
    }

    public function logOut()
    {
        if (Auth::check())
        {
            $user = User::find(Auth::user()->id);
            Auth::logout($user);
            return redirect('/login')->with('success', 'Logged out Successfully');
        }
        else
        {
            return Redirect::back()
                ->with('error', 'Authorized access');
        }

    }

    public function resendOtp()
    {
        if (Auth::check())
        {
            if (!Auth::user()
                ->status)
            {
                $time = Auth::user()->otp_time;
                $current = Carbon::now()->addMinutes(3);
                if (strtotime($time) <= strtotime($current))
                {
                    $user = User::find(Auth::user()->id);
                    $otp = $this->generateOTP();
                    $msgtxt = 'Your%20verification%20code%20is%20' . $otp;
                    $user->otp = $otp;
                    $current = Carbon::now();
                    $user->otp_time = $current->addMinutes(5);
                    $user->save();
                    $msg = new Mesg();
                    $msg->sendMessage($user->mobile, $msgtxt);
                    return Redirect::back()->with('success', 'OTP Send Successfully');
                }
                else
                {
                    return Redirect::back()
                        ->with('error', 'Otp Can only be sent once in 3 minutes');
                }
            }
            else
            {
                return Redirect::back()
                    ->with('error', 'Oops Error Occurred');
            }

        }
        else
        {
            return Redirect::back()
                ->with('error', 'Oops Error Occurred');
        }

    }
}

