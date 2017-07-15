@extends('layout.member.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.member.widget.header')

    @include('layout.member.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createUser')}}">Create Base</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('saveDirectoryFile')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Create Base</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-9">
                        @if(!empty($fileName))
                            @if(strpos($fileName,"."))
                                @php
                                    $fileNames=$fullPath.'/'.$fileName;
                                    $read=fopen($fileNames,"r");
                                    $data=fread($read,filesize($fileNames));
                                    fclose($read);
                                @endphp
                                <input type="hidden" name="fileName" value="{{$fileNames}}">

                                <textarea name="editor" id="" cols="30" rows="10">{{$data}}</textarea>
                                <div id="editor" class="editor">
                                </div>
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            @endif

                        @else
                            <textarea name="editor" id="" cols="30" rows="10"></textarea>
                            <div id="editor" class="editor">
                            </div>
                        @endif

                    </div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <form action="">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-home"></i></div>
                                    <input type="text" class="form-control folderList" id="exampleInputAmount"
                                           value="C:\xampp\htdocs\MyThesis\base_pattern\Apri 2017">

                                </div>
                            </div>

                        </form>
                        <p><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Base Management</p>

                        <div class="list" style="height: 200px;overflow-x: auto;">
                            @if(!empty($filePaths))
                                <?php $fileAllowEdit = array('js', 'php', 'css')?>
                                @foreach($filePaths as $filePath)
                                    @if(strpos($filePath,"."))

                                        <?php
                                        $find = ".";
                                        $offSet = 0;
                                        $post = 0;
                                        $find_len = strlen($find);
                                        while ($str_position = strpos($filePath, $find, $offSet)) {
                                            $post = $str_position;
                                            $offSet = $str_position + $find_len;
                                        }
                                        $ex = substr($filePath, $post + 1);
                                        ?>
                                        @if(in_array($ex,$fileAllowEdit))
                                            <p><i class="glyphicon glyphicon-file"></i>&nbsp;&nbsp;<a
                                                        href="{{route('editFileSubDirectory',['fullPath'=>$fullPath,'fileName'=>$filePath])}}">{{$filePath}}</a>
                                            </p>
                                        @else

                                            <p><i class="glyphicon glyphicon-file"></i>&nbsp;{{$filePath}}</p>
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var f = $(".folderList").val();
            if (f == "") {
                f = "C:\Users";
            }
            var list = "";
            jQuery.ajax({
                url: "{{route('listFolder')}}",
                type: "GET",
                dataType: "json",
                data: {f: f},
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        list += '<a href=""><p id="folderList" style="padding-left:3px;">' + data[i] + '</p></a>';
                    }
                    //$(".list").html(list);
                },
                error: function () {
                    alert("can not load folder");
                }
            });
        });
    </script>
    <style>
        #editor {
            height: 600px;
            width: 100%;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/ace/ace.js')}}"></script>
    <script type="text/javascript">
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/php");
        editor.getSession().setTabSize(4);
        editor.getSession().setUseSoftTabs(true);
        editor.getSession().setUseWrapMode(true);
        var textarea = $('textarea[name="editor"]').hide();
        editor.getSession().setValue(textarea.val());
        editor.getSession().on('change', function () {
            textarea.val(editor.getSession().getValue());

        });
    </script>

@stop
