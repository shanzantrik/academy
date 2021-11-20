<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Semester;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;
use Razorpay\Api\Api;
use Mail;
use App\Mesg;
use Redirect;

class PaymentController extends Controller
{
    public function makePayment(){
    	return view('payments');
    }

    public function paymentConfirm(Request $request){
          
          $semester = Semester::find($request->semester_id);

          if($semester->is_custom=='0' || $semester->user_id==Auth::user()->id){
               
               $payments = Payment::where('user_id',Auth::user()->id)->where('semester_id',$semester->id)->first();
               if(!$payments){
                  return view('paynow',compact('semester'));
               }
               else{
          	     return Redirect::back()->with('error','Invalid Request Please try again');
               }
          }
          else{
          	return Redirect::back()->with('error','Invalid Request Please try again');
          }
    }

    public function payment($id)
    {
        //Input items of form
        $input = Input::all();

        //get API Configuration 
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
                
            }
            $sem = Semester::find($id);
            $payment = new Payment();
            $payment->user_id = Auth::user()->id;
            $payment->semester_id = $id;
            $payment->amount = $sem->amount;
            $payment->trx_id = $input['razorpay_payment_id'];
            $payment->save();
            
            $msgtxt = "Payment%20of%20Rs%20".$payment->amount."received%20successfully";
            $msg = new Mesg();
            $msg->sendMessage(Auth::user()->mobile, $msgtxt);
            
            $email = Auth::user()->email;
            $text = "";
            $text .= "<h1>Payment of Rs ".$payment->amount." received successfully. Reimalie Academy </h1>";
            Mail::send([], [], function ($message) use ($text,$email){
                $message->to($email)
                ->subject("Payment Status")
                ->setBody($text, 'text/html'); 
            });
        }
        return redirect('/home')->with('success','Payment success');
    }
}
