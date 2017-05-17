<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta http-equiv="Refresh" content="number">--}}
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body style="margin-bottom: 50px">
    @yield('body_content')
    {{Html::script('js/app.js')}}
</body>
</html>