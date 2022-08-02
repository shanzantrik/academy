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

                        <h5 class="text-left font-weight-bold">COURSE DETAILS </h5>

                        <div class="form-group row">


                            <div class="col-md-4">
                                <label for="name" class="col-form-label ">Course Name</label>
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


                           <div class="col-md-4">
                            <label for="name" class="col-form-label ">Department Name</label>
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


                           <div class="col-md-4">
                                <label for="name" class=" col-form-label ">Semester</label>

                                <select name="current_sem" class="form-control">
                                <option value="Semester-1">Semester 1</option>
                                <option value="Semester-2">Semester 2</option>
                                <option value="Semester-3">Semester 3</option>
                                <option value="Semester-4">Semester 4</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="name" class="col-form-label ">Session</label>
                                <input type="text" name="session" class="form-control">
                            </div>


                            <div class="col-md-4">
                            <label for="name" class="col-form-label ">Batch No:</label>
                                <input type="text" name="batch_no" class="form-control">
                            </div>


                            <div class="col-md-4">
                                <label for="name" class="col-form-label ">Enrollment No:</label>

                                <input type="text" name="enrollment_no" class="form-control">
                            </div>
                       
                            <div class="col-md-12 pt-5 pb-3"> 
                                <h5 class="text-left font-weight-bold">APPLICANT'S DETAILS </h5>
                            </div>


                            <div class="col-md-6">
                                <label for="name" class="col-form-label ">Enter Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label  ">Father's Name</label>
                                <input type="text" name="father_name" class="form-control" required>
                            </div>
                        

                            <div class="col-md-6">
                                <label for="name" class="col-form-label  ">Mother's Name</label>
                                <input type="text" name="mother_name" class="form-control" required>
                            </div>
                        

                            <div class="col-md-6">
                                <label for="name" class="col-form-label  ">Guardian/Spouse Name</label>

                                <input type="text" name="guardian_name" class="form-control">
                            </div>


                            <div class="col-md-6  pt-2 pb-2">
                                <label for="name" class=" col-form-label ">Date of Birth</label>

                                <input type="date" name="date_of_birth" class="form-control">
                            </div>


                            <div class="col-md-6 pt-2 pb-2">
                                <label for="name" class="col-form-label  ">Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                        

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Landline Number</label>
                                <input type="text" name="landline" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class=" col-form-label">Education Qualification</label>
                                <input type="text" name="education_qualification" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class=" col-form-label">Name of Degree/Course/Examination last attended</label>
                                <input type="text" name="last_course" class="form-control">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 pt-5 pb-3"> 
                                <h5 class="text-left font-weight-bold">Marks of Last Examination </h5>
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Marks Secured</label>
                                <input type="text" name="marks_secured" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Percentage</label>
                                <input type="text" name="percentage" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Grade</label>
                                <input type="text" name="grade" class="form-control">
                            </div>
      
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">CGPA</label>
                                <input type="text" name="cgpa" class="form-control">
                            </div>


                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Class/Division</label>
                                <input type="text" name="division" class="form-control">
                            </div>

                            <div class="col-md-12 pt-5">
                                <h5 class="text-left font-weight-bold">Application Documents</h5>
                            <p> Note: Supported file format <b>.jpg</b> and <b>.png</b> </p>
			    </div>

                            <div class="col-md-6 pt-4 pb-4">
                                <label for="name" class="col-form-label ">Candidate Photo</label> <br>
                                <input type="file" name="photo" class=" border p-2 w-100">
                            </div>


                            <div class="col-md-6 pt-4 pb-4">
                                <label for="name" class="col-form-label ">Candidate Signature</label> <br>
                                <input type="file" name="signature" class=" border p-2 w-100">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success w-100 mt-4">SUBMIT</button>


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

<div class="container-fluid">
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div align="center" style="background:yellow;padding-top:40px;margin-top:0px;">
                        <img src="https://www.reimalieacademycollege.com/wp-content/uploads/2018/03/logofinal.png" class="img-fluid" alt="Reimalie Academy College"/><br>
                        <div> </div>
                        <h2><strong>Online Admission & Fee Collection</strong></h2><br>
                    </div>
			<div class="card p-5">
                        <div class="alert alert-danger" role="alert">
                            Please Login to Fill the application
                        </div>
			
                          <p>
			   Kindly register with your email and mobile number and verify your registration with the OTP that you will receive.
		           After verification you can fill up the Admission form. Once Admission form is submitted you will get an update on SMS for payment.
			   Kindly Login with your email and password and make the necessary payment. For support kindly call us at +91-7002180464.
			  </p>
			

			<div align="center">
			   <a href="{{ route('login') }}" class="btn btn-primary" role="button">{{ __('Login') }}</a>
			   <a href="{{ route('register') }}" class="btn btn-danger" role="button">{{ __('Register') }}</a>
			</div>
		      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
