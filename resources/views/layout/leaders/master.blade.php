<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <script src="{{asset('js/jquery-1.9.1.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.js')}}"></script>
    <link rel="icon" href="{{asset('icon/1489853216_system-users.png')}}">
    <link href="{{asset('css')}}/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="{{asset('css')}}/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="{{asset('css')}}/select2.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js')}}/jquery-ui.js"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">


    <title>@yield('title')</title>
</head>
<body>
@yield('content')
<script type="text/javascript">

    tinymce.init({
        selector: '.textarea',
        height: 200,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>

</body>
</html>