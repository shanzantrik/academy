@extends('layouts.admin')
@section('title','Application Detail')

@section('content')
<section class="content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Application Form</div>

                <div class="card-body">
                    <form action="/moderator/update-application/{{$application->id}}" method="post" enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	<div class="row justify-content-center">
                    	    <div class="col-6">
                    	        <div class="float-right right">
                    	            <img src="/images/{{$application->photo}}" height="150px" width="175px">
                    	        </div>
                    	    </div>
                    	    <div class="left col-6">
                    	        <img src="/images/{{$application->signature}}" height="150px" width="175px">
                    	    </div>
                    	</div>
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
                                 $s2 = str_replace(' ', '', $application->course_name);
                                ?>
                                <option @if($s1==$s2) selected @endif value="{{$course->name}}"> {{$course->name}} </option>
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
                                 $s2 = str_replace(' ', '', $application->department_name);
                                ?>
                                <option @if($s1==$s2) selected @endif value="{{$department->name}}"> {{$department->name}} </option>
                                @endforeach
                                </select>
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">Semester</label>

                           <div class="col-md-2">
                               
                                <select name="current_sem" class="form-control">
                                <option 
                                @if($application->current_sem === 'Semester-1') selected 
                                @endif
                                 value="Semester-1">Semester 1</option>
                                <option @if($application->current_sem === 'Semester-2') selected 
                                @endif value="Semester-2">Semester 2</option>
                                <option 
                                @if($application->current_sem === 'Semester-3') selected 
                                @endif
                                value="Semester-3">Semester 3</option>
                                <option 
                                @if($application->current_sem === 'Semester-4') selected 
                                @endif 
                                value="Semester-4">Semester 4</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Session</label>

                            <div class="col-md-2">
                                <input type="text" name="session" class="form-control" value="{{$application->session}}">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Batch No:</label>

                            <div class="col-md-2">
                                <input type="text" name="batch_no" class="form-control" value="{{$application->batch_no}}">
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">Enrollment No:</label>

                            <div class="col-md-2">
                                <input type="text" name="enrollment_no" class="form-control" value="{{$application->enrollment_no}}">
                            </div>
                        </div>

                    	<h5 class="text-left">APPLICANT'S DETAILS </h5>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Enter Full Name</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{$application->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Father's Name</label>

                            <div class="col-md-6">
                                <input type="text" name="father_name" class="form-control" value="{{$application->father_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mother's Name</label>

                            <div class="col-md-6">
                                <input type="text" name="mother_name" class="form-control" value="{{$application->mother_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Guardian/Spouse Name</label>

                            <div class="col-md-6">
                                <input type="text" name="guardian_name" class="form-control" value="{{$application->guardian_name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input type="date" name="date_of_birth" class="form-control" value="{{$application->date_of_birth}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <textarea name="address" class="form-control">
                                	{{$application->address}}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Landline Number</label>

                            <div class="col-md-6">
                                <input type="text" name="landline" class="form-control" value="{{$application->landline}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                            <div class="col-md-6">
                                <input type="text" name="mobile" class="form-control" value="{{$application->mobile}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input type="text" name="email" class="form-control" value="{{$application->email}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Education Qualification</label>

                            <div class="col-md-6">
                                <input type="text" name="education_qualification" class="form-control" value="{{$application->education_qualification}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name of Degree/Course/Examination last attended</label>

                            <div class="col-md-6">
                                <input type="text" name="last_course" class="form-control" value="{{$application->last_course}}">
                            </div>
                        </div>

                        <p class="text-left">Marks of Last Examination </p>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Marks Secured</label>

                            <div class="col-md-2">
                                <input type="text" name="marks_secured" class="form-control" value="{{$application->marks_secured}}">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Percentage</label>

                            <div class="col-md-2">
                                <input type="text" name="percentage" class="form-control" value="{{$application->percentage}}">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Grade</label>

                            <div class="col-md-2">
                                <input type="text" name="grade" class="form-control" value="{{$application->grade}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">CGPA</label>

                            <div class="col-md-2">
                                <input type="text" name="cgpa" class="form-control" value="{{$application->cgpa}}">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">Class/Division</label>

                            <div class="col-md-2">
                                <input type="text" name="division" class="form-control" value="{{$application->division}}">
                            </div>
                        </div>

                        <div class="form-group row">
                         <label for="name" class="col-md-2 col-form-label text-md-right">Status</label>
                            <div class="col-md-10">
                               <select name="status" class="form-control" required>
                                   <option @if($application->status=="1") selected @endif value="1">Accepted</option>
                                   <option @if($application->status=="2") selected @endif value="2">Rejected</option>
                               </select>
                            </div>
                        </div>

                        <?php
                           $sems = App\Semester::where('is_custom','0')->get();
                        ?>

                        @foreach($sems as $sem)

                         <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{$sem->title}}</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" value="Rs {{$sem->amount}}" readonly>
                            </div>
                        </div>
                        @endforeach


                        <?php
                           $semss = App\Semester::where('user_id',$application->user_id)->get();
                        ?>

                        @foreach($semss as $sem)

                         <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">{{$sem->title}}</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" value="Rs {{$sem->amount}}" readonly>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Extra Payment Description</label>
                            <div class="col-md-10">
                            <input type="text" name="title" class="form-control">
                        </div>
                        </div>
                         <div class="form-group row">
                            
                            <label class="col-md-2 col-form-label text-md-right">Amount</label>
                            <div class="col-md-10">
                            <input type="number" name="amount" class="form-control">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection