@extends('layouts.master')
@section('title','Manage Installments')

@section('content')
<section class="content">
<div class="box">

	<div class="box-header">
              <h4 class="text-center">Manage Installments</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Amount</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                @foreach($installments as $installment)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$installment->title}}</td>
                  <td>{{$installment->amount}}</td>
                  <td> 
                  	 <a class="btn btn-link" data-toggle="modal" data-target="#modal-primary_{{$installment->id}}">
               Edit
                    </a>
                  </td>
                </tr>
                
                <?php
                 $i++;
                ?>

         <div class="modal fade" id="modal-primary_{{$installment->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/edit-installment/{{$installment->id}}" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter installment Name </label>
              			<input type="text" class="form-control" value="{{$installment->title}}" name="installment_name" required>
              		</div>
                  <div class="form-group">
                    <label>Enter installment Amount </label>
                    <input type="number" class="form-control" value="{{$installment->amount}}" name="amount" required>
                  </div>
              		<button type="submit" class="btn btn-success">Update installment </button>
              	</form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                
                @endforeach
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
      

	 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
               Add New installment
      </button>


        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/create-installment" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter installment Title </label>
              			<input type="text" class="form-control" name="installment_name" required>
              		</div>

                  <div class="form-group">
                    <label>Enter installment Amount </label>
                    <input type="number" class="form-control" name="amount" required>
                  </div>
              		<button type="submit" class="btn btn-success">Add installment </button>
              	</form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</div>
</section>
@endsection