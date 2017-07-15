@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('adminManage')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('createGroup')}}"><i class="glyphicon glyphicon-th-large"></i> Group</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('createGroup')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> Group</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Group Name*</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="groupName" id="" class="form-control">
                            <label for="" class="text-danger">{{$errors->first('groupName')}}</label>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Group Type*</label>
                        </div>
                        <div class="col-md-8">
                            <select name="groupType" id="" class="form-control">
                                <option value="first">First</option>
                                <option value="base">Base</option>
                                <option value="qc">QC</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="groupDescription" id="" cols="30" rows="5" class="form-control"></textarea>
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
                <form action="{{route('searchGroup')}}" method="get">
                    <img src="{{asset('icon/1489866801_icon-111-search.png')}}" alt="" id="isearch">
                    <input type="text" name="search" id="search" placeholder="search...">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Group Name</th>
                        <th>Description</th>
                        <th>Group Type</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>
                                <a href="{{route('editGroup',['id'=>$group->id])}}" ><i class="glyphicon glyphicon-edit"></i></a> &nbsp;
                                <a href="{{route('deleteGroup',['id'=>$group->id])}}" onclick="return confirm('Are you sure to delete this group?')"><i class="glyphicon glyphicon-trash"></i></a> &nbsp;
                                <a href="{{route('groupActive',array('id'=>$group->id))}}">@if($group->active=="0")  <i class="glyphicon glyphicon-ban-circle"></i> @else <i class="	glyphicon glyphicon-ok-circle"></i> @endif</a></td>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->description}}</td>
                            <td>{{$group->type}}</td>
                            <td>@if($group->active) Active @else Inactive @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$groups->render()}}
    </div>
@stop