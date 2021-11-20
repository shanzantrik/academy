@extends('layouts.app')

@section('content')


@if(Auth::check())
<?php

 $ac = App\Application::where('user_id',Auth::user()->id)->first();
?>
@if(!$ac)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Application Form</div>

                <div class="card-body">
                    <form action="/application" method="post" enctype="multipart/form-data">
                    	{{ csrf_field() }}

                    	<h5 class="text-left">COURSE DETAILS </h5>

                    	<div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Course Name</label>

                            <div class="col-md-2">
                                
                                <select name="course_name" class="form-control">
                                <?php
                                $courses = App\Course::all();
                                ?>
                                @foreach($courses as $course)
                                <?php
                                 $s1 = str_replace(' ', '', $course->name);
                                ?>
                                <option value="{{$course->name}}"> {{$course->name}} </option>
                                @endforeach
                                </select>
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Department Name</label>

                           <div class="col-md-2">
                                
                                <select name="department_name" class="form-control">
                                <?php
                                $departments = App\Department::all();
                                ?>
                                @foreach($departments as $department)
                                <?php
                                 $s1 = str_replace(' ', '', $department->name);
                                ?>
                                <option value="{{$department->name}}"> {{$department->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">Semester</label>

                           <div class="col-md-2">
                                
                                <select name="current_sem" class="form-control">
                                <option value="Semester-1">Semester 1</option>
                                <option value="Semester-2">Semester 2</option>
                                <option value="Semester-3">Semester 3</option>
                                <option value="Semester-4">Semester 4</option>
                                </select>
                            </div>
                             
                      

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Session</label>

                            <div class="col-md-2">
                                <input type="text" name="session" class="form-control">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Batch No:</label>

                            <div class="col-md-2">
                                <input type="text" name="batch_no" class="form-control">
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">Enrollment No:</label>

                            <div class="col-md-2">
                                <input type="text" name="enrollment_no" class="form-control">
                            </div>
                        </div>
                    	<h5 class="text-left">APPLICANT'S DETAILS </h5>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Enter Full Name</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Father's Name</label>

                            <div class="col-md-6">
                                <input type="text" name="father_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mother's Name</label>

                            <div class="col-md-6">
                                <input type="text" name="mother_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Guardian/Spouse Name</label>

                            <div class="col-md-6">
                                <input type="text" name="guardian_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input type="date" name="date_of_birth" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <textarea name="address" class="form-control">
                                	
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Landline Number</label>

                            <div class="col-md-6">
                                <input type="text" name="landline" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                            <div class="col-md-6">
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Education Qualification</label>

                            <div class="col-md-6">
                                <input type="text" name="education_qualification" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name of Degree/Course/Examination last attended</label>

                            <div class="col-md-6">
                                <input type="text" name="last_course" class="form-control">
                            </div>
                        </div>
                        <p class="text-left">Marks of Last Examination </p>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Marks Secured</label>

                            <div class="col-md-2">
                                <input type="text" name="marks_secured" class="form-control">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Percentage</label>

                            <div class="col-md-2">
                                <input type="text" name="percentage" class="form-control">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Grade</label>

                            <div class="col-md-2">
                                <input type="text" name="grade" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">CGPA</label>

                            <div class="col-md-2">
                                <input type="text" name="cgpa" class="form-control">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Class/Division</label>

                            <div class="col-md-2">
                                <input type="text" name="division" class="form-control">
                            </div>

                            
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">Candidate Photo</label>

                            <div class="col-md-3">
                                <input type="file" name="photo" class="">
                            </div>

                            <label for="name" class="col-md-3 col-form-label text-md-right">Candidate Signature</label>

                            <div class="col-md-3">
                                <input type="file" name="signature" class="">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success">SUBMIT</button>
                        

                    </form>
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
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login to continue</div>

                <div class="card-body">
                    <div align="center">
                        <img src="images/logofinal-2.png" class="img-fluid" alt="Reimalie Academy College"/><br>
                        <div> </div>
                        <h2><strong>Online Admission & Fee Collection</strong></h2><br>
                    </div>
                        <div class="alert alert-danger" role="alert">
                            Please Login to Fill the application
                        </div>
                        <p>Kindly register with your email and mobile number and verify your registration with the OTP that you will receive. After verification you can fill up the Admission form. Once Admission form is submitted you will get an update on SMS for payment. Kindly Login with your email and password and make the necessary payment. For support kindly call us at +91-7002180464.</p>
                   <div align="center"><a href="{{ route('login') }}" class="btn btn-primary" role="button">{{ __('Login') }}</a> <a href="{{ route('register') }}" class="btn btn-danger" role="button">{{ __('Register') }}</a></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
