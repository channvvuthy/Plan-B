@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('adminManage')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('createUser')}}"><i class="glyphicon-user glyphicon"></i> User</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('createUser')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> User</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Username*</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="userName" id="" class="form-control" value="{{old('userName')}}">
                            <span class="text-danger">{{$errors->first('userName')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Email*</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="email" id="" class="form-control" value="{{old('email')}}">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Password*</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password" id="" class="form-control" required>
                            <span class="text-danger">{{$errors->first('password
                            ')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Role</label>
                        </div>
                        <div class="col-md-8">
                            <select name="roleName" id="" class="form-control">
                                <option value="">Choose Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Group</label>
                        </div>
                        <div class="col-md-8">
                            <select name="groupName" id="" class="form-control" required>
                                <option value="">Choose Group</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
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
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Group</th>
                        <th>Group Type</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{route('editUser',['id'=>$user->id])}}"><i class="glyphicon glyphicon-edit"></i></a> &nbsp;
                                <a href="{{route('deleteUser',['id'=>$user->id])}}" onclick="return confirm('Are you sure to delete this user?')"><span class="glyphicon-trash glyphicon"></span></a> &nbsp;
                                <a href="{{route('activeUser',['id'=>$user->id])}}">@if($user->status=="1")   <i class="glyphicon glyphicon-ok-circle"></i> @else <i class="glyphicon glyphicon-ban-circle"></i> @endif</a></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{$role->permission}}
                                @endforeach
                            </td>

                            <td>
                                {{$user->group['name']}}
                            </td>
                            <td>{{$user->group['type']}}</td>
                            <td>
                                @if($user->status=='1')
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$users->render()}}
    </div>
@stop