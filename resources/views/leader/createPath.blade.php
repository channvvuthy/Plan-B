@extends('layout.leaders.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('createUser')}}" style="width:170px;"><i class="glyphicon glyphicon-paperclip"></i> Directory Path</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('baseDirectory')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Directory</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Directory Name</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="pathName" id="" class="form-control"
                                   value="@if(!empty($path)) {{$path->path}} @endif">
                            <input type="hidden" name="oldPath" id="" class="form-control"
                                   value="@if(!empty($path)) {{$path->path}} @endif">
                            <span class="text-danger">{{$errors->first('pathName')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Directory Description</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="pathDescription" id="" cols="30" rows="7"
                                      class="form-control textarea">@if(!empty($path)) {{$path->description}} @endif</textarea>
                            <span class="text-danger">{{$errors->first('pathDescription')}}</span>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon glyphicon-save"></i> Save</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
@stop