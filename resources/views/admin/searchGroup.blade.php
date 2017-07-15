@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createGroup')}}">Group</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <div class="panel panel-default SystemForm">
            <div class="panel-heading">
                <form action="{{route('searchGroup')}}" method="get">
                    <img src="{{asset('icon/1489866801_icon-111-search.png')}}" alt="" id="isearch">
                    <input type="text" name="search" id="search">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>

            </div>
            <div class="panel-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>
                                <a href="{{route('editGroup',['id'=>$group->id])}}" ><i class="glyphicon glyphicon-edit"></i></a> &nbsp;
                                <a href="{{route('deleteGroup',['id'=>$group->id])}}" onclick="return confirm('Are you sure to delete this group?')"><i class="glyphicon glyphicon-trash"></i></a> &nbsp;
                                <a href="{{route('groupActive',array('id'=>$group->id))}}">@if($group->active=="0")  <i class="glyphicon glyphicon-ban-circle"></i> @else <i class="	glyphicon glyphicon-ok-circle"></i> @endif</a>
                            </td>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->description}}</td>
                            <td>@if($group->active) Active @else Inactive @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
