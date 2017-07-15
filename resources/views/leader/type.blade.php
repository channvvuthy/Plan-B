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
                <li><a href="{{route('uploadType')}}" style="width:150px;"> <i class="glyphicon glyphicon-leaf"></i> Type</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('uploadType')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Type</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Type</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="type" id="" class="form-control">
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="description" id="" class="form-control">
                            <span class="text-danger">{{$errors->first('description')}}</span>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Type</h4>
            </div>
            <div class="panel-body">
                @if(!empty($types))
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>
                                    <a href="{{route('editType',['id'=>$type->id])}}"><span class="glyphicon glyphicon-edit "></span></a>&nbsp;
                                    <a href="{{route('deleteType',['id'=>$type->id])}}" onclick="return confirm('Are want to delete?')"><i class="glyphicon-trash glyphicon"></i></a>
                                </td>
                                <td>{{$type->id}}</td>
                                <td>{{$type->name}}</td>
                                <td>{{$type->description}}</td>
                                <td>@if($type->status==1) Active @else Inactive @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@stop