@extends('layouts.master')
@section('title','Manage Courses')

@section('content')
<section class="content">
<div class="box">

	<div class="box-header">
              <h4 class="text-center">Manage Courses</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                @foreach($courses as $course)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$course->name}}</td>
                  <td> 
                  	 <a class="btn btn-link" data-toggle="modal" data-target="#modal-primary_{{$course->id}}">
               Edit
                    </a>
                  </td>
                  <td>
                      <form action="{{ route('course.destroy', [$course->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                
                <?php
                 $i++;
                ?>

         <div class="modal fade" id="modal-primary_{{$course->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/edit-course/{{$course->id}}" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter Course Name </label>
              			<input type="text" class="form-control" value="{{$course->name}}" name="course_name" required>
              		</div>
              		<button type="submit" class="btn btn-success">Update Course </button>
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
               Add New Course
      </button>


        <div class="modal fade" id="modal-primary">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-body">

              	<form action="/create-course" method="post">
              		{{csrf_field()}}
              		<div class="form-group">
              			<label>Enter Course Name </label>
              			<input type="text" class="form-control" name="course_name" required>
              		</div>
              		<button type="submit" class="btn btn-success">Add Course </button>
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