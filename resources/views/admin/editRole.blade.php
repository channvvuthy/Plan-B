@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createRole')}}">Role</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('updateRole')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="id" value="{{$role->id}}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Role</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Role Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="roleName" id="" class="form-control" value="{{$role->name}}">
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="roleDescription" id="" cols="30" rows="5" class="form-control">{{$role->description}}</textarea>
                        </div>
                    </div>


                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Permission</label>
                        </div>
                        <div class="col-md-8">
                            <p><input type="radio" name="rolePermission" value="admin" @if($role->permission=="admin") checked @endif><b>Administrator</b></p>
                            <p><input type="radio" name="rolePermission" value="manager" @if($role->permission=="manager") checked @endif><b> Manager</b></p>
                            <p><input type="radio" name="rolePermission" value="leader" @if($role->permission=="leader") checked @endif><b>Leader </b></p>
                            <p><input type="radio" name="rolePermission" value="member" @if($role->permission=="member") checked @endif><b>Member </b></p>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height: 35px;"><i class="glyphicon-save glyphicon"></i> Update Role</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>

    </div>
@stop