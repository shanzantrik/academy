@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Mobile') }}</div>

                <div class="card-body">
                    <form action="/verify" method="post" class="verification-inner text-center">
                {{ csrf_field() }}
                <h3>Enter Email Verification 6 Digit Code</h3>
                <h6>we have send otp to your registed email ending with <b>{{Auth::user()->email}}</b></h6>
		<p class="text-danger">Incase you have not received your email OTP, kindly please chaeck your spam folder for the email OTP. </p>
                <div class="row justify-content-center">
                <div class="form-group ccase l-8">
                <label>Enter OTP </label>
                <input type="number" class="form-control" name="otp" max="999999" required>
                </div>
               

                <div class="col-12">
                    <div class="text-center">
                    <button type="submit" class="btn btn-success">Verify</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="text-center mt-4">
                   <a class="btn btn-link" href="/resendOtp"> Resend OTP </a>
               </div>
                   </div>

                </div>
               

            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
