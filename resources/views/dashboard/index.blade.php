@extends('layouts.master')
@section('title','Applications')

@section('content')
<section class="content">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Applications</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Batch</th>
                  <th>Departments</th>
                  <th>Status </th>
                  <th>Date</th>
                  <th>View</th>
                  <th>PDF</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                     $i= 1;
                    ?>
                    @foreach($applications as $application)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$application->name}}</td>
                  <td>{{$application->course_name}}</td>
                  <td>{{$application->batch_no}}</td>
                  <td>{{$application->department_name}}</td>
                  <td>
                    @if($application->status=="1")
                     Accepted
                    @elseif($application->status=="2")
                     Rejected
                    @else
                      Submitted
                    @endif
                  </td>
                  <td>{{$application->created_at->format('d M Y')}}</td>
                  <td> <a href="/admin/application/{{$application->id}}">View</a> </td>
                  <td> <a href="/admin/application-pdf/{{$application->id}}">PDF</a> </td>
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