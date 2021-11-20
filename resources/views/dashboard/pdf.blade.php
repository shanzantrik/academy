<html>
<head>
	<title></title>
</head>
<b style="display:none;">$application = App\Application::where('user_id',Auth::user()->id)->first();</b>

<body autocomplete="off">
<center><img alt="Reimalie Academy College" class="img-fluid" src="{{url('/')}}/images/logofinal-2.png" />
<h2>Online Admission Form (New/Semester/Renewal)</h2>
<h3>Application No:{{$application->roll_no}}</h3>
</center>

<p><img height="150px" src="{{url('/')}}/images/photo/{{$application->photo}}" style="position:absolute; right: 6px;" width="160px" /><br />
</p>

<p><strong>Course Details:</strong></p>

<p>Name of Course....................................: <u>{{$application->course_name}}</u><br />
Department/Pedagogy...........................: <u>{{$application->department_name}}</u><br />
Current Semester..................................: <u>{{$application->current_sem}}</u><br />
Session..................................................: <u>{{$application->session}}</u><br />
Batch No...............................................: <u>{{$application->batch_no}}</u><br />
Enrollment No......................................: <u>{{$application->enrollment_no}}</u><br />
Roll No.................................................: <u>{{$application->roll_no}}</u></p>
<p><strong>Applicant's detail</strong></p>
<p>1. Name...........................................................................: <u> {{$application->name}} </u><br />
2. Father's Name.............................................................: <u> {{$application->father_name}} </u><br />
3. Mother's Name...........................................................: <u> {{$application->mother_name}} </u><br />
4. Guardian/Spouce Name..............................................: <u> {{$application->guardian_name}} </u><br />
5. Date of Birth...............................................................: <u> {{$application->date_of_birth}} </u><br />
6. Address.......................................................................: <u> {{$application->address}} </u><br />
7. Land Line....................................................................: <u> {{$application->landline}} </u><br />
8. Mobile.........................................................................: <u> {{$application->mobile}} </u><br />
9. Email...........................................................................:<u> {{$application->email}} </u><br />
10. Educational Qualification............................................:<u> {{$application->education_qualification}} </u><br />
11.Name of Course/Degree/Examination last attended..: <u> {{$application->last_course}} </u><br />
12. Marks of last examination attended/semester............:<br />
a. Marks secured..............................................................: <u> {{$application->marks_secured}} </u><br />
b. Percentage....................................................................: <u> {{$application->percentage}} </u><br />
c. Grade............................................................................: <u> {{$application->grade}} </u><br />
d. CGPA...........................................................................:<u> {{$application->cgpa}} </u><br />
e. Class/Division..............................................................: <u> {{$application->division}} </u></p>
<center>
<p><strong><u>Declaration</u></strong></p>
</center>
<p style="font-size:12px">I <u>{{$application->name}}</u> do hereby declare that the above statements are true to the best of my knowledge and belief. That, I am applying to admit/existing student of this institution and going to admit in the ................. semester to continue my study. That, I will obey the college rules and regulations to be modified from time to time and bear no harm to the institution.</p>
<p align="right"><img height="30px" src="{{url('/')}}/images/sign/{{$application->signature}}" style="position:absolute; right: 0px;" width="160px" /> <br> <br> <br> Signature of student</p>
</body>
</html>
