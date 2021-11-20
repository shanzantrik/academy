@extends('layouts.app')

@section('content')
<?php

 $ac = App\Application::where('user_id',Auth::user()->id)->first();
?>
@if(!$ac)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <a href="/" class="btn btn-success">Apply Now </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if($ac->status=="1")

                <div class="card-header">Application Accepted</div>

                <div class="card-body">
                    
                        <div class="alert alert-success" role="alert">
                            Make Payment
                        </div>
                   <a href="/make-payment" class="btn btn-success">Make Payment Now</a>

                    
                </div>

                @elseif($ac->status=="2")

                <div class="card-header">Application Rejected</div>

                <div class="card-body">
                    
                        <div class="alert alert-danger" role="alert">
                            Refill Application
                        </div>
                   <a href="/edit-application/{{$ac->id}}" class="btn btn-success">Edit Now </a>

                    
                </div>

                @else
                <div class="card-header">Under Process</div>

                <div class="card-body">
                    
                        <div class="alert alert-warning" role="alert">
                            Application Submitted
                        </div>
                    
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endif
@endsection
