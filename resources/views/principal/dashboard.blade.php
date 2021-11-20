@extends('layouts.admin')
@section('title','Principal Dashboard')

@section('content')
<section class="content">
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
            	<?php
                 $total_amount = App\Payment::sum('amount');
            	?>
              <h3>Rs {{$total_amount}}</h3>

              <p>Total Payments</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            	<?php
                $accepted = App\Application::where('status','1')->count();
            	?>
              <h3>{{$accepted}}</h3>

              <p>Accepted Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            	<?php
                $total = App\Application::count();
            	?>
              <h3>{{$total}}</h3>

              <p>Total Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            	<?php
                $rejected = App\Application::where('status','2')->count();
            	?>
              <h3>{{$rejected}}</h3>

              <p>Rejected Applications</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
</section>
@endsection