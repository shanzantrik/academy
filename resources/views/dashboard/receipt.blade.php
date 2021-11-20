<html>
<head>
	<title></title>
</head>
<b style="display:none;">$application = App\Application::where('user_id',Auth::user()->id)->first();</b>

<body autocomplete="off">
<center><img alt="Reimalie Academy College" class="img-fluid" src="{{url('/')}}/images/logofinal-2.png" />
<h2>FEE RECEIPT</h2>
<?php
                $sem = App\Semester::find($payment->semester_id);
                $user = App\User::find($payment->user_id);
                $application = App\Application::where('user_id',$payment->user_id)->first();
                ?>
<center>
    <table>
    <thead>
        <tr>
            <th>Student Name</th>
            <th>{{$user->name}}</th>
        </tr>
        
        <tr>
            <th>Enrollment Number</th>
            <th>{{$application->enrollment_no}}</th>
        </tr>
        
        <tr>
            <th>Amount Paid</th>
            <th>Rs {{$payment->amount}}</th>
        </tr>
        
        <tr>
            <th>Purpose of Payment</th>
            <th>{{$sem->title}}</th>
        </tr>
        
        <tr>
            <th>Payment ID</th>
            <th>{{$payment->trx_id}}</th>
        </tr>
        
        <tr>
            <th>Date</th>
            <th>{{$payment->created_at->format('d M Y') }}</th>
        </tr>
    </thead>
</table>
</center>
<style>
table{
    min-width:100%;
}
    th{
        border:1px solid black;
        padding:2%;
    }
</style>
</body>
</html>
