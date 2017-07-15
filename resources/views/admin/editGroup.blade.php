@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="">Group</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('updateGroup')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="id" value="{{$group->id}}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Group</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Group Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="groupName" id="" class="form-control" value="{{$group->name}}">
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Group Type</label>
                        </div>
                        <div class="col-md-8">
                            <select name="groupType" id="" class="form-control">
                                <option value="first" @if($group->type=="first") selected   @endif>First</option>
                                <option value="base" @if($group->type=="base") selected   @endif>Base</option>
                                <option value="qc" @if($group->type=="qc")  selected  @endif>QC</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="groupDescription" id="" cols="30" rows="5" class="form-control">{{$group->description}}</textarea>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height:35px;"><i class="glyphicon-save glyphicon"></i> Update</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>

    </div>
@stop