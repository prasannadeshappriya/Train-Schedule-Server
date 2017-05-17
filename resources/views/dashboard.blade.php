@extends('layout.layout')

@section('body_content')
    <div class="container">
        <?php
            $session = new \Symfony\Component\HttpFoundation\Session\Session();
        ?>
        <div style="margin-top: 50px">
            <h1 class="text-info text-center">Train Schedule Feedback <br>Dashboard</h1>
            <br>
            <div class="col-lg-12">

                <div class="col-lg-6">
                    @if($session->has('username'))
                        <h5 class="text-info"> Hello {{$session->get('username')}}</h5>
                    @endif
                </div>
                <div class="col-lg-6">
                    <h5 class="text-info" style="text-align: end"><a href="{{url('logout')}}">LogOut</a> </h5>
                </div>
            </div>
            <br><br>
            @foreach($arrResult as $feedback)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-info">Email :- {{$feedback['email']}}</h4>
                    </div>
                    <div class="panel-body">
                        <p>{{$feedback['message']}}</p>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@stop