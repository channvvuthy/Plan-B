<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <script src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.js')}}"></script>
    <link rel="icon" href="{{asset('icon/1489853216_system-users.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
  @yield('content')
</body>
</html>