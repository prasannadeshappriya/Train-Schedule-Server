@extends('layout.layout')

@section('body_content')
    <div class="container">
        <div style="margin-top: 120px">
            <h1 class="text-info text-center">Train Schedule Feedback <br>Dashboard</h1>
            @if($agent->isMobile())
                <br><br>
            @else
                <br><br><br><br>
            @endif
            <h3 class="text-info text-center">Login to continue</h3>
            {!! Form::open(['url'=>'login', 'method'=>'post', 'role'=>'form']) !!}
            <div class="row">
                @if(isset($_COOKIE['username']))
                    {!! Form::control('text','6 col-lg-offset-3','username',$errors, trans('front/login.username'),$_COOKIE['username']) !!}
                @else
                    {!! Form::control('text','6 col-lg-offset-3','username',$errors, trans('front/login.username')) !!}
                @endif
                {!! Form::control('password','6 col-lg-offset-3','password',$errors, trans('front/login.password')) !!}
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <input type="checkbox" value="1" name="rem" class="checkbox checkbox-inline"> &nbsp; Remember Me
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('error'))
                        <p class="text-info text-center" style="color: red">{{session('error')}}</p>
                    @endif
                    <input type="submit" value="{{trans('front/login.signin')}}" class="center-block btn btn-default" style="width: 150px"/>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop