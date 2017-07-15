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
    <title>Login</title>
</head>
<body>
<div class="container-fluide">
    <div class="header_login btn btn-default btn-block " style="cursor: default;">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                <div class="imageUserLogin">
                    <img src="{{asset('icon/1489853216_system-users.png')}}"/>
                </div>
                <div class="titleSystem">
                    Employee Management System of Plan-B
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clear-top"></div>
    <div class="container login">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <p></p>
                        <p class="text-center font-impact">Login</p>
                    </div>
                    <br>
                    <form action="" method="post">
                        <div class="panel-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group relative">
                                <div class="icon absolute">
                                    <img src="{{asset('icon/1489854682_free-17.png')}}" alt="">
                                </div>
                                <input type="text" name="email" id="" class="form-control"
                                       placeholder="Enter Email Address">
                                <div class="clearfix"></div>
                                <div class="error">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                            </div>
                            <div class="form-group relative">
                                <div class="icon absolute">
                                    <img src="{{asset('icon/1489855172_icon-116-lock-open.png')}}" alt="">
                                </div>
                                <input type="password" name="password" id="" class="form-control"
                                       placeholder="Enter Password">
                                <div class="error">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                            </div>
                            <div class="form-group relative">
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>