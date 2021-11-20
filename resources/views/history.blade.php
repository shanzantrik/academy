@extends('layouts.app')

@section('content')
<?php
$payments = App\Payment::where('user_id',Auth::user()->id)->get();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Past Payments</div>

                <div class="card-body">
                   <div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Paid For </th>
            <th>Amount </th>
            <th>Payment ID/ Remarks </th>
            <th>Date</th>
            <th>Download Receipt</th>
            <th>Download Application</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $i =1;
        ?>
        @foreach($payments as $payment)
        <tr>
            <td> {{$i}} </td>
            <td>
                <?php
                $sem = App\Semester::find($payment->semester_id);
                ?>
                {{$sem->title}}
            </td>
            <td> Rs {{$payment->amount}}</td>
            <td> {{$payment->trx_id}}</td>
            <td> {{$payment->created_at->format('d M Y') }}</td>
            <td><a href="/download/receipt-pdf/{{$payment->id}}">Receipt</a></td>
            <td><a href="/download-application-pdf/{id}">Form</a></td>
        </tr>
        <?php
          $i++;
        ?>
        @endforeach
    </tbody>
  </table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection