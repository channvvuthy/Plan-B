@extends('layout.admin.master')
@section('content')
    @include('layout.member.widget.header')
    @include('layout.member.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createGroup')}}">Profile</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>
        @endif
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Update Profile</h4>
            </div>
            <div class="panel-body">
                <form action="{{route('updateMyProfile')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                               style="text-indent: 0;">
                    </div>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"
                               style="text-indent: 0;">
                    </div>
                    <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" value="" style="text-indent: 0;">
                    </div>

                    <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@stop