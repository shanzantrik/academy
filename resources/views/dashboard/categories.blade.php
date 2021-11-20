@extends('layouts.master')
@section('title','Manage Fee Categories')

@section('content')
<section class="content">
<div class="box">

	<div class="box-header">
              <h4 class="text-center">Manage Fee Categories</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Course </th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                @foreach($categories as $category)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->course->name}}
                  <td> 
                  	 <a class="btn btn-link" data-toggle="modal" data-target="#modal-primary_{{$category->id}}">
               Edit
                    </a>
                  </td>
                </tr>
                
                <?php
                 $i++;
                ?>

         <div class="modal fade" id="modal-primary_{{$category->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/edit-category/{{$category->id}}" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter category Name </label>
              			<input type="text" class="form-control" value="{{$category->name}}" name="category_name" required>
              		</div>

                  <div class="form-group">
                    <label>Select Course </label>
                    <select name="course_id" class="form-control" required>
                      <option>Select </option>
                      @foreach($courses as $course)
                      <option @if($course->id==$category->course_id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                      @endforeach
                    </select>
                  </div>

              		<button type="submit" class="btn btn-success">Update category </button>
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
               Add New category
      </button>

      <a class="btn btn-success" href="/manage-fees">Manage Fees</a>

     


        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/create-category" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter category Name </label>
              			<input type="text" class="form-control" name="category_name" required>
              		</div>
                  
                  <div class="form-group">
                    <label>Select Course </label>
                    <select name="course_id" class="form-control" required>
                      <option>Select </option>
                      @foreach($courses as $course)
                      <option value="{{$course->id}}">{{$course->name}}</option>
                      @endforeach
                    </select>
                  </div>

              		<button type="submit" class="btn btn-success">Add Category </button>
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