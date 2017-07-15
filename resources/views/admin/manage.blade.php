@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('adminManage')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('adminManage')}}"><i class="glyphicon-dashboard glyphicon"></i> Dashboard</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>
        @endif
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="page-header">
                <p><span class="glyphicon glyphicon-th-large"></span> Group</p>
            </div>
            <table class="table-responsive table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Group Name</th>
                    <th>Group Type</th>
                </tr>
                </thead>
                <tbody>
                @php $groups=App\Models\Group::where('status','!=','0')->paginate(10);@endphp
                @if(!empty($groups))
                    @foreach($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->type}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$groups->render()}}
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="page-header">
                <p><span class="glyphicon glyphicon-user"></span> User</p>
            </div>
            <table class="table-responsive table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Permission</th>
                </tr>
                </thead>
                <tbody>
                @php $users=App\Models\User::where('status','!=','0')->paginate(10);@endphp
                @if(!empty($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                        {{$role->permission}}
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$users->render()}}
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="page-header">
                <p><span class="glyphicon glyphicon-heart-empty"></span> Role</p>
            </div>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Role Permission</th>
                </tr>
                </thead>
                <tbody>
                @php $roles =App\Models\Role::paginate(10);@endphp
                @if(!empty($roles))
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->permission}}</td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
            {{$roles->render()}}
        </div>

    </div>
@stop