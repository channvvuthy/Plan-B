@extends('layout.leaders.master')
@section('title')
    Leader
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('createLayout')}}"><i class="fa fa-shopping-bag"></i> Layout</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('updateLayout')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Layout Name</h4>
                </div>
                <input type="hidden" name="id" value="{{$layout->id}}">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Layout Name</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="layoutName" id="" class="form-control tokenfield"
                                   value="{{$layout->name}}" data-role="tagsinput">
                            <span class="text-danger">{{$errors->first('patternName')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="layoutDescription" id="" cols="30" rows="7"
                                      class="form-control textarea">{{$layout->description}}</textarea>
                            <span class="text-danger">{{$errors->first('patternDescription')}}</span>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon-save glyphicon"></i>Update Layout</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
    @stop