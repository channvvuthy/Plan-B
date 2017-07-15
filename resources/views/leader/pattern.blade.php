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
                <li><a href="{{route('leader.index')}}"><span class="glyphicon-home glyphicon"></span></a></li>
                <li><a href="{{route('createPattern')}}"><i class="fa fa-tags"></i> Pattern</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('createPattern')}}" class="SystemForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Pattern</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Choose Variation</label>
                        </div>
                        <div class="col-md-10">
                            <select name="variation" id="" class="form-control">
                                @foreach($variations as $variation)
                                    <option value="{{$variation->id}}">{{$variation->name}}</option>
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
                                   value="{{old('patternName')}}">
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
                                   value="{{old('patternURL')}}">
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
                                      class="form-control textarea"></textarea>
                            <span class="text-danger">{{$errors->first('patternDescription')}}</span>
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
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Variation </th>
                        <th>Pattern</th>
                        <th style="overflow-y: auto;width: 100px">Pattern URL</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patterns as $pattern)
                        <tr>
                            <td>
                                <a href="{{route('editPattern',['id'=>$pattern->id])}}"><i class="glyphicon-edit glyphicon"></i></a>&nbsp;
                                <a href="{{route('deletePattern',['id'=>$pattern->id])}}"><i class="glyphicon-trash glyphicon"></i></a>&nbsp;
                                <a href="{{route('activePattern',['id'=>$pattern->id])}}">@if($pattern->status=="1") <i class="	glyphicon glyphicon-ok-circle"></i> @else <i class="	glyphicon glyphicon-ban-circle"></i> @endif</a>
                            </td>
                            <td>{{$pattern->id}}</td>
                            <td><div style="width:100px;overflow-x: auto;"> {{$pattern->variation->name}}</div></td>
                            <td><div style="width:100px;overflow-x: auto;"> {{$pattern->name}}</div></td>
                            <td><div style="width:100px;overflow-x: auto;"> <a href="{{$pattern->url}}">{{$pattern->url}}</a></div></td>
                            <td><div style="width: 200px;overflow-x: auto;">{!! $pattern->description !!}</div></td>
                            <td><a href="{{asset('uploads')}}/{{$pattern->file_name}}">{{$pattern->file_name}}</a></td>
                            <td>
                                @if($pattern->status==1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$patterns->render()}}
            </div>
        </div>
    </div>
{{$patterns->render()}}
@stop