@extends('layouts.master')
@section('title','Payments')

@section('content')
<?php
$payments = App\Payment::all();
?>
<section class="content">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
      Add New Payment
  </button>

   <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

                <form action="/admin/update-payment" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Enter Student Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Select Installment </label>
                    <select name="semester_id" class="form-control" required>
                      <?php
                        $sems = App\Semester::where('is_custom','0')->get();
                      ?>
                      <option>Select </option>
                      @foreach($sems as $sem)
                      <option value="{{$sem->id}}">{{$sem->title}} - Rs {{$sem->amount}}</option>
                      @endforeach
                    </select>
                  </div>

                  <button type="submit" class="btn btn-success">Add New Payment </button>
                </form>
              </div>
            </div>
          </div>
        </div>


<div class="box">
            <div class="box-header">
              <h3 class="box-title">All Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Roll No </th>
                  <th>Installment</th>
                  <th>Amount </th>
                  <th>Payment ID </th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                    @foreach($payments->sortByDesc('created_at') as $payment)
                <tr>
                  <td>{{$i}}</td>
                  <td>
                    <?php
                     $application = App\Application::where('user_id',$payment->user_id)->first();
                    ?>
		 
                    {{ $application['name'] }}
                  </td>
                  <td>
                    {{ $application['roll_no'] }}
                  </td>
                  <td>
                    <?php
                      $sem = App\Semester::find($payment->semester_id);
                    ?>
                    {{$sem->title}}
                   </td>
                   <td>Rs {{$sem->amount}} </td> 
                   <td>{{$payment->trx_id}} </td>
                   <td> {{$payment->created_at->format('d M Y') }} </td>
                </tr>
                <?php
                 $i++;
                ?>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</section>
@endsection
