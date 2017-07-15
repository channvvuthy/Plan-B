@extends('layout.member.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.member.widget.header')

    @include('layout.member.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('member.index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('createBase')}}"><i class="glyphicon glyphicon-paperclip"></i> Create Base</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('saveFile')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Create Base</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-9" style="padding-left: 0px;">
                        @if(!empty($newFileName))
                            @if(strpos($newFileName,"."))
                                @php
                                    $fileNames=$newPaths.'/'.$newFileName;
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
                            @if(!empty($mode))
                                <textarea name="editor" id="" cols="30" rows="10"></textarea>
                                <div id="editor" class="editor">
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="">Select Type</label>
                                    <select name="" id="type" class="form-control">
                                        @if(!empty($types))
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}" data-name="{{$type->name}}">{{$type->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Version</label>
                                    <select name="" id="version" class="form-control">
                                        @if(!empty($versions))
                                            @foreach($versions as $version)
                                                <option value="{{$version->id}}" data-name="{{$version->name}}">{{$version->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4>Your Pattern</h4>
                                    <hr>
                                    @if(!empty(Auth::user()->patterns))
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>URL</th>
                                                <th>File</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(Auth::user()->patterns as $pattern)
                                                <tr>
                                                    <td><input type="radio" name="variation" class="variation"
                                                               data="{{$pattern->variation->id}}-{{$pattern->id}}">{{$pattern->name}}
                                                    </td>
                                                    <td>
                                                        <div style="width: 250px;overflow-x: auto"><a
                                                                    href="{{$pattern->url}}">{{$pattern->url}}</a></div>
                                                    </td>
                                                    <td>
                                                        <a href="{{asset('uploads')}}/{{$pattern->file_name}}">{{$pattern->file_name}}</a>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;overflow-x: auto">
                                                            {!!$pattern->description!!}
                                                        </div>

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    <h4>Your Base</h4>
                                    <hr>
                                    @if(!empty($fs))
                                        @php $i=0;@endphp
                                        @if(is_array($fs))
                                            @foreach($fs as $f)

                                                @if(!strpos($f,"."))
                                                    <label class="checkbox-inline"><input type="checkbox" value="{{$f}}"
                                                                                          name="base" id="base_{{$i}}">
                                                        <p></p><b>{{$f}}</b></label>
                                                    @php $i++;@endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <div class="total" data="{{$i}}"></div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="">Leader Path</label>
                                            <input type="text" name="leaderPath" id="leaderPath" class="form-control"
                                                   value="@if(!empty($leaderPath)){{$leaderPath->path}} @endif">
                                        </div>
                                        <div class="form-group">
                                            <div class="progress hidden" id="savingFile">
                                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                     style="width:100%">
                                                    Saving File...
                                                </div>
                                            </div>
                                            <div class="alert alert-success message hidden">
                                                File has been save success
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success copyAndSave" style="height:35px;"><i class="glyphicon glyphicon-save"></i> Copy and Save
                                            </button>
                                        </div>

                                    @endif
                                </div>
                            @endif

                        @endif
                    </div>
                    <div class="col-md-3" style="padding-right: 0px;">
                        <form action="">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="glyphicon glyphicon-home"></i></div>
                                    <input type="text" class="form-control folderList" id="exampleInputAmount"
                                           value="@if(!empty(Auth::user()->path)){{Auth::user()->path->path}} @endif">

                                </div>
                            </div>

                        </form>
                        <div id="contextMenu" oncontextmenu="return customRightClick(event);">
                            <p><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Base Management</p>
                            <ul class="list-unstyled" id="subContextMenu">
                                <li data="create_file" data-tile="Create New File"><i
                                            class="glyphicon glyphicon-file"></i>&nbsp;&nbsp;Create New
                                    File
                                </li>
                                <li data="create_folder" data-tile="Create New Folder"><i
                                            class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Create
                                    New Folder
                                </li>
                                <li data="delete_file" data-tile="Delete File"><i class="glyphicon glyphicon-file"></i>&nbsp;&nbsp;Delete
                                    File
                                </li>
                                <li data="delete_folder" data-tile="Delete Folder"><i
                                            class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Delete
                                    Folder
                                </li>
                                <li data="refresh_page" data-tile=""><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;Refresh
                                    Page
                                </li>
                                <li data="exit"><i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;Exit</li>

                            </ul>
                            @if(!empty($fs))
                                @if(is_array($fs))
                                    @foreach($fs as $f)
                                        <div class="main">
                                            @if(!empty($fileName))
                                                @if($f==$fileName)
                                                    @if(!empty($ls))
                                                        @if(is_array($ls))
                                                            @foreach($ls as $l)
                                                                <div>
                                                                    @if(strpos($l,"."))
                                                                        <a href="{{route('editFile',['oldPath'=>$path,'path'=>$path.'/'.$f,'oldFileName'=>$f,'fileName'=>$l])}}"><i
                                                                                    class="glyphicon glyphicon-file"></i>&nbsp;&nbsp;{{$l}}
                                                                        </a>
                                                                    @else
                                                                        <a href="{{route('subDirectory',['fullPath'=>$newPaths."/".$l])}}"><i
                                                                                    class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;{{$l}}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endif
                                            @else
                                                <p><a href="{{route('readFile',['path'=>$path,'fileName'=>$f])}}"><i
                                                                class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;{{$f}}
                                                    </a>
                                                </p>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                        <div class="list" style="height: 200px;overflow-x: auto;"></div>
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

        function customRightClick(event) {
            event.preventDefault();
            $("#subContextMenu").css({"display": "block"});
            $("#subContextMenu").css({"margin-to": event.clientY + 'px'});
        }
    </script>
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Path Name</label>
                        <input type="text" name="path" id="path" class="form-control">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label for="">Item Name</label>
                        <input type="text" name="" id="fileName" class="form-control">
                    </div>

                    <div class="progress hidden">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45"
                             aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>

                    </div>
                    <div class="alert alert-success hidden"></div>
                    <div class="alert alert-danger hidden"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveItem">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
        $("#saveItem").click(function () {
            var path = $("#path").val();
            var fileName = $("#fileName").val();
            var pathLeader = $(".leaderPath").val();
            if (path == "") {
                alert("Please enter path name");
                return;
            }
            if (fileName == "") {
                alert("Please enter file name");
                return;
            }

            /*
             Function create folder
             */
            if (type == 'create_folder') {
                fileName = fileName.replace(".", "_");
                jQuery.ajax({
                    url: "{{route('createFolder')}}",
                    type: "GET",
                    dataType: "json",
                    data: {path: path, fileName: fileName},
                    beforeSend: function () {
                        $(".progress").removeClass('hidden');
                    },
                    success: function (data) {
                        $(".progress").addClass('hidden');
                        $(".alert-success").removeClass('hidden');
                        $(".alert-success").text(data);


                    },
                    complete: function (data) {
                        $(".progress").addClass('hidden');
                        $(".alert-success").removeClass('hidden');
                        $(".alert-success").text(data.responseText);
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    },
                    error: function (data) {
                        alert(data)
                    }
                });
            }
            /*
             End function create folder
             ======================================
             /*
             Function create file
             */
            if (type == 'create_file') {

                if (fileName.indexOf(".") == "-1") {
                    alert("Please add extension of file");
                    return;
                }
                jQuery.ajax({
                    url: "{{route('createFile')}}",
                    type: "GET",
                    dataType: "json",
                    data: {path: path, fileName: fileName},
                    beforeSend: function () {
                        $(".progress").removeClass('hidden');
                    },
                    success: function (data) {
                        $(".progress").addClass('hidden');
                        $(".alert-success").removeClass('hidden');
                        $(".alert-success").text(data);


                    },
                    complete: function (data) {
                        $(".progress").addClass('hidden');
                        $(".alert-success").removeClass('hidden');
                        $(".alert-success").text(data.responseText);
                        setTimeout(function () {
                            window.location.reload();
                        }, 500);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
        var variation = "";
        $(".variation").click(function () {
            variation = $(this).attr('data');
        });
        $(".copyAndSave").click(function () {
            if (variation == "") {
                alert("Please select pattern");
                return;
            }
            var version=$("#version").val();
            var version_name=$("#version option:selected").attr('data-name');
            var type=$("#type").val();
            var type_name=$("#type option:selected").attr('data-name');

            var string = "";
            var total = $(".total").attr('data');
            for (var i = 0; i <= 6; i++) {
                var qcheck = $('#base_' + i + '');
                if (qcheck.is(":checked")) {
                    string += qcheck.val() + ',';
                }

            }
            var path = $("#exampleInputAmount").val();
            var leaderPath = $("#leaderPath").val();
            jQuery.ajax({
                url: "{{route('copayAndSave')}}",
                type: "GET",
                dataType: "json",
                data: {path: path, leaderPath: leaderPath, string: string, variation: variation,version:version,version_name:version_name,type:type,type_name:type_name},
                beforeSend: function () {
                    $("#savingFile").removeClass("hidden");
                },
                success: function (data) {
                    //console.log(data);
                    $("#savingFile").removeClass("hidden");
                },
                complete: function (data) {
                    $("#savingFile").addClass("hidden");
                    $(".message").removeClass('hidden');
                }
            });

        });

    </script>
@stop
