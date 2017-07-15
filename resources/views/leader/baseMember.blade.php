@extends('layout.leaders.master')
@section('title')
    Leader
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('getMemberBase')}}" style="width:150px;"><i class="glyphicon glyphicon-link"></i> Base Member</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('assignMember')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            @if($errors->first('error'))
                <div class="alert alert-danger">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Assign Pattern</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="">Choose Variation</label>
                            </div>
                            <div class="col-md-8">
                                <select name="variationDefault" id="variationDefault" class="form-control">
                                    @foreach($variations as $variation)
                                        <option value="{{$variation->id}}">{{$variation->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('variationDefault')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="">Choose Pattern</label>
                            </div>
                            <div class="col-md-8">
                                <select name="variationGet[]" id="variationGet" class="form-control" multiple
                                        style="height: auto !important;padding:0px !important;">

                                </select>
                                <span class="text-danger">{{$errors->first('variationGet')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Choose Member</label>
                        </div>
                        <div class="col-md-10">
                            @php
                                $groupID=App\Models\Group::where('type','base')->where('active','1')->first();

                            $users=App\Models\User::where('group_id',$groupID->id)->get();
                            @endphp
                            <select name="member[]" id="memberBase" class="form-control" multiple>
                                @foreach($users as $user)
                                    @if($user->id!=Auth::user()->id)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif

                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('member')}}</span>

                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon-save glyphicon"></i> Save</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
        <div class="panel panel-default SystemForm">
            <div class="panel-heading">
                <h4>Base Pattern Member</h4>
            </div>
            <div class="panel-body">

                <table class="table table-responsive img">
                    <thead>
                    <tr>
                        <td></td>
                        <td>ID</td>
                        <td>Member Name</td>
                        <td>Pattern Name</td>
                        <td>Pattern URL</td>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        @if($user->id !=Auth::user()->id)
                            <tr>
                                <td>
                                    <a href="{{route('deleteBaseAssign',['id'=>$user->id])}}">
                                    <i class="glyphicon-trash glyphicon"></i>
                                    </a>
                                </td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @foreach($user->patterns as $pattern)
                                        <p>{{$pattern->name}}</p>
                                    @endforeach
                                </td>
                                <td>
                                    <div style="width:150px;overflow-x: auto;">
                                        @foreach($user->patterns as $pattern)
                                            <a href="{{$pattern->url}}">{{$pattern->url}}</a>
                                        @endforeach
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var variationDefault = $("#variationDefault").val();
            var option = "";
            jQuery.ajax({
                url: "{{route('getVariationDefault')}}",
                type: "GET",
                dataType: "json",
                data: {variationDefault: variationDefault},
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        option += '<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>';
                    }
                    $('#variationGet').html(option);

                },
                error: function () {
                    alert("can not loading data");
                }
            });
            $("#variationDefault").on('change', function () {
                var variationDefault = $(this).val();
                var option = "";
                jQuery.ajax({
                    url: "{{route('getVariationDefault')}}",
                    type: "GET",
                    dataType: "json",
                    data: {variationDefault: variationDefault},
                    success: function (data) {
                        for (var i = 0; i < data.length; i++) {
                            option += '<option value="' + data[i]['id'] + '">' + data[i]['name'] + '</option>';
                        }
                        $('#variationGet').html(option);

                    },
                    error: function () {
                        alert("can not loading data");
                    }
                });
            });
            $("#variationGet").select2();
            $("#memberBase").select2();
        });
    </script>
@stop