@extends('layout.admin.master')
@section('content')
    @include('layout.admin.widget.header')
    @include('layout.admin.widget.navbar')
    <div class="col-md-9">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="">Setting</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        @if($errors->first('notice'))
            <div class="alert alert-success">
                {{$errors->first('notice')}}
            </div>


        @endif
        <form action="{{route('getSetting')}}" class="SystemForm" method="post">
            <input type="hidden" name="_token" value="{{Session::token()}}">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Setting</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <p></p>
                            <label for="">Auto Backup</label>
                        </div>
                        <div class="col-md-8">
                            <input type="checkbox" name="autoBackup" id="" @if($setting->auto_backup) checked @endif>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <label for="">Backup Date</label>
                        </div>
                        <div class="col-md-8">
                            <select name="backupDate" id="" class="form-control">
                                @for($i=1;$i<=31;$i++)
                                    <option value="{{$i}}" @if($setting->date==$i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-2" style="padding-left: 0px;">
                            <p></p>
                            <label for="">Dateline Alert</label>
                        </div>
                        <div class="col-md-8">
                            <input type="checkbox" name="alertDateline" id="" @if($setting->alert) checked @endif>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success addPadding">Save</button>
                        </div>
                    </div>
                    <div class="clearfix clear-top-simple"></div>
                </div>
                <div class="panel-footer"><h1></h1></div>
            </div>
        </form>
        
    </div>
@stop