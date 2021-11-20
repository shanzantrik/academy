@extends('layouts.master')
@section('title','Manage Departments')

@section('content')
<section class="content">
<div class="box">

	<div class="box-header">
              <h4 class="text-center">Manage Departments</h4>
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
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                @foreach($departments as $department)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$department->name}}</td>
                  <td>{{$department->course->name}}
                  <td> 
                  	 <a class="btn btn-link" data-toggle="modal" data-target="#modal-primary_{{$department->id}}">
               Edit
                    </a>
                  </td>
                  <td>
                      <form action="{{ route('department.destroy', [$department->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                
                <?php
                 $i++;
                ?>

         <div class="modal fade" id="modal-primary_{{$department->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/edit-department/{{$department->id}}" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter Department Name </label>
              			<input type="text" class="form-control" value="{{$department->name}}" name="department_name" required>
              		</div>

                  <div class="form-group">
                    <label>Select Course </label>
                    <select name="course_id" class="form-control" required>
                      <option>Select </option>
                      @foreach($courses as $course)
                      <option @if($course->id==$department->course_id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                      @endforeach
                    </select>
                  </div>

              		<button type="submit" class="btn btn-success">Update department </button>
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
               Add New Department
      </button>


        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/create-department" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter department Name </label>
              			<input type="text" class="form-control" name="department_name" required>
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

              		<button type="submit" class="btn btn-success">Add department </button>
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