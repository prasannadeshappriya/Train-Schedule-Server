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
                @if($agent->isMobile())
                    @if($session->has('username'))
                        <h5 class="text-info"> Hello {{$session->get('username')}} [<a href="{{url('logout')}}">LogOut</a>]</h5>
                    @else
                        <h5 class="text-info"> Hello user [<a href="{{url('logout')}}">LogOut</a>]</h5>
                    @endif
                @else
                    <div class="col-lg-6">
                        @if($session->has('username'))
                            <h5 class="text-info"> Hello {{$session->get('username')}}</h5>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <h5 class="text-info" style="text-align: end"><a href="{{url('logout')}}">LogOut</a> </h5>
                    </div>
                @endif
            </div>
            <br><br>
            @if(session()->has('message'))
                @if(session()->has('delete'))
                    <p class="text-info text-center" style="color: red">{{session('message')}} [<a href={{url('dashboard/undodelete/'.session('email').'/'.session('u_message'))}}>Undo</a>]</p>
                @else
                    <p class="text-info text-center" style="color: red">{{session('message')}}</p>
                @endif
            @endif
            @if(empty($arrResult))
                <p class="text-info text-center" style="margin-bottom: 300px; color: black">No feedback data available related to the app. <br> Details will be displayed as soon as they available.</p>
            @endif
            @foreach($arrResult as $feedback)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="text-info">Email :- {{$feedback['email']}}</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{$feedback['message']}}</p>
                        <a href="{{url('dashboard/delete/'.$feedback['email'].'/'.$feedback['message'])}}" class="btn btn-default" style="width: 150px; float: right;">Delete</a>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@stop