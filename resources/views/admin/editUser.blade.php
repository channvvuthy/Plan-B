@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createUser')}}">User</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('updateUser')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4> User</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Username</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="userName" id="" class="form-control" value="{{$user->name}}">
                            <span class="text-danger">{{$errors->first('userName')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="email" id="" class="form-control" value="{{$user->email}}">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Password</label>
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
                            <?php $permission = "";$groupN = "";?>
                            @foreach($user->roles as $role)
                                @php
                                    $permission=$role->name;
                                @endphp
                            @endforeach
                            <select name="roleName" id="" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}"
                                            @if($permission==$role->name) selected @endif>{{$role->name}}</option>

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
                            <select name="groupName" id="" class="form-control">
                                <option value="">Choose Group</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @if($group->name==$user->group['name']) selected @endif>{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height:35px;"><i class="glyphicon-save glyphicon"></i> Update User</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
    </div>
@stop