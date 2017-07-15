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
                <li><a href="{{route('addNewOrder')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('addNewOrder')}}" style="width:170px;"><i class="fa fa-address-book"></i> Add Order</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('addNewOrder')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Addd Order</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Choose File</label>
                        </div>
                        <div class="col-md-10">
                            <input type="file" name="file" id="" class="form-control">
                            <span class="{{($errors->first('file')?'text-danger':'')}}">{{($errors->first('file'))?:'File is allow only extention csv*'}}</span>
                            <p></p>
                            <span class="text-danger">{{$errors->first('error')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon-save glyphicon"></i>Save</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
@stop