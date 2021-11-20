@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make Payment</div>
    <div class="row justify-content-center">
                
                <form class="col-md-6" action="/make-payment" method="post">
                    {{ csrf_field() }}

                <div class="form-group">
                    <label>Select Payment</label>
                    <?php
                     $sems = App\Semester::where('is_custom','0')->get();
                     $semss = App\Semester::where('user_id',Auth::user()->id)->get();

                    ?>
                    <select name="semester_id" class="form-control">
                        @foreach($sems as $sem)
                          <?php
                           $payment = App\Payment::where('semester_id',$sem->id)->where('user_id',Auth::user()->id)->first();
                          ?>
                          @if(!$payment)
                          <option value="{{$sem->id}}">{{$sem->title}} - Rs {{$sem->amount}}</option>   
                          @endif
                        @endforeach
                        @foreach($semss as $sem)
                          <?php
                           $payment = App\Payment::where('semester_id',$sem->id)->where('user_id',Auth::user()->id)->first();
                          ?>
                          @if(!$payment)
                          <option value="{{$sem->id}}">{{$sem->title}} - Rs {{$sem->amount}}</option>   
                          @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-success">Proceed </button>
                <br>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            </div>
        </div>
    </div>
</div>
@endsection
