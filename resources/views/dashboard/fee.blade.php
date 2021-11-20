@extends('layouts.master')
@section('title','Manage Fees')

@section('content')
<section class="content">
<div class="box">

	<div class="box-header">
              <h4 class="text-center">Manage Fees</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Amount </th>
                  <th>Category </th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                @foreach($fees as $fee)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $fee->title }}</td>
                  <td>{{ $fee->amount }} </td>
                  <td>{{ $fee->category->name }}
                  <td> 
                  	 <a class="btn btn-link" data-toggle="modal" data-target="#modal-primary_{{$fee->id}}">
               Edit
                    </a>
                  </td>
                </tr>
                
                <?php
                 $i++;
                ?>

         <div class="modal fade" id="modal-primary_{{$fee->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/edit-fee/{{$fee->id}}" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter fee Name </label>
              			<input type="text" class="form-control" value="{{$fee->title}}" name="title" required>
              		</div>

                  <div class="form-group">
                    <label>Enter fee Amount </label>
                    <input type="number" value="{{$fee->amount}}" class="form-control" name="amount" required>
                  </div>

                  <div class="form-group">
                    <label>Select category </label>
                    <select name="category_id" class="form-control" required>
                      <option>Select </option>
                      @foreach($categories as $category)
                      <option @if($category->id==$fee->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>

              		<button type="submit" class="btn btn-success">Update fee </button>
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
               Add New fee
      </button>


        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/create-fee" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter fee Name </label>
              			<input type="text" class="form-control" name="title" required>
              		</div>

                  <div class="form-group">
                    <label>Enter fee Amount </label>
                    <input type="number" class="form-control" name="amount" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Select category </label>
                    <select name="category_id" class="form-control" required>
                      <option>Select </option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>

              		<button type="submit" class="btn btn-success">Add fee </button>
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