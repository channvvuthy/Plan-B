@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="{{route('adminManage')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href=""><i class="glyphicon glyphicon-heart-empty"></i> Role</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('createRole')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Role</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Role Name*</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="roleName" id="" class="form-control">
                            <label for="" class="text-danger">{{$errors->first('roleName')}}</label>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Description</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="roleDescription" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Permission</label>
                        </div>
                        <div class="col-md-8">
                            <p><input type="radio" name="rolePermission" value="admin" checked><b>Administrator</b></p>
                            <p><input type="radio" name="rolePermission" value="manager"><b> Manager</b></p>
                            <p><input type="radio" name="rolePermission" value="leader"><b>Leader </b></p>
                            <p><input type="radio" name="rolePermission" value="member"><b>Member </b></p>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding" style="height:35px;"> <i class="glyphicon-save glyphicon"></i> Save</button>
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
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                <a href="{{route('editRole',['id'=>$role->id])}}"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;
                                <a href="{{route('deleteRole',['id'=>$role->id])}}" onclick="return confirm('Are you sure to delete this role')"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->permission}}</td>
                            <td>{{$role->description}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$roles->render()}}

    </div>
@stop