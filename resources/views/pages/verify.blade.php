@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
                    <form action="/verify" method="post" class="verification-inner text-center">
                {{ csrf_field() }}
                <h3>Enter Email Verification 6 Digit Code</h3>
                <h6>We have send otp to your email address <b><u>{{Auth::user()->email}}</u></b></h6>
                <div class="row justify-content-center">
                <div class="form-group col-8">
                <label>Enter OTP </label>
                <input type="number" class="form-control" name="otp" max="999999" required>
                </div>
               

                <div class="col-6">
                    <div class="float-right">
                    <button type="submit" class="btn btn-success">Verify</button>
                    </div>
                </div>

                <div class="col-6">
                    <div class="float-left">
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
