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
                <li><a href="{{route('createPattern')}}"><i class="fa fa-tags"></i> Pattern</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('updatePattern')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Edit Pattern</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Choose Variation</label>
                            <input type="hidden" name="id" value="{{$pattern->id}}">
                        </div>
                        <div class="col-md-10">
                            <select name="variation" id="" class="form-control">
                                @foreach($variations as $variation)
                                    <option value="{{$variation->id}}" @if($variation->id==$pattern->variation_id) selected @endif>{{$variation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Pattern Name</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="patternName" id="" class="form-control"
                                   value="{{$pattern->name}}">
                            <span class="text-danger">{{$errors->first('patternName')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Pattern URL</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="patternURL" id="" class="form-control"
                                   value="{{$pattern->url}}">
                            <span class="text-danger">{{$errors->first('patternURL')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Pattern File</label>
                        </div>
                        <div class="col-md-10">
                            <input type="file" name="patternFile" id="" class="form-control">
                            <span class="text-danger">{{$errors->first('patternFile')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-10">
                            <textarea name="patternDescription" id="" cols="30" rows="7"
                                      class="form-control textarea">{!! $pattern->description !!}</textarea>
                            <span class="text-danger">{{$errors->first('patternDescription')}}</span>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon-save glyphicon"></i>Update Pattern</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
@stop