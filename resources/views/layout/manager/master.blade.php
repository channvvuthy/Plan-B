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
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.js')}}"></script>
    @yield('style')
    <link rel="icon" href="{{asset('icon/1489853216_system-users.png')}}">
    <link href="{{asset('css')}}/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="{{asset('css')}}/jquery-ui.css" type="text/css" rel="stylesheet">
    <link href="{{asset('css')}}/select2.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js')}}/jquery-ui.js"></script>
    <script src="{{asset('tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
    
    <title>@yield('title')</title>
    <style>
        #contextMenu {
            position: relative;
        }

        ul#subContextMenu {
            border: 1px solid #ffffff;
            padding: 5px;
            display: none;
            position: absolute;
            z-index: 100;
            background-color: #00CCFF;
            width: 200px;
        }

        ul#subContextMenu li {
            color: #fff;
            padding: 4px 4px;
        }

        ul#subContextMenu li:hover {
            background-color: #eee;
            color: #00b3ee;
        }
        table td, table th{
            padding:7px !important;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    var type="";
    var path="";
    $('body').on('click', '#subContextMenu li', function () {
        var defualtLocation = $("#exampleInputAmount").val();
        path=defualtLocation;
        var attr = $(this).attr('data');
        type=attr;
        $("#path").val(defualtLocation);
        var title = $(this).attr('data-tile');
        $("#subContextMenu").hide();
        if (title) {
            $(".modal").modal("show");
            $(".modal-title").text(title);
        } else if (attr == 'refresh_page') {
            window.location.reload();
        }

    });
</script>
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

</script>
<script>
    var editor = ace.edit("editor");

</script>
@yield('script')
</body>
</html>