@extends('layout.leaders.master')
@section('title')
    Leader
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leaderFirstGetBase')}}"><i class="glyphicon-home glyphicon"></i></a></li>
                <li><a href="{{route('leaderFirstGetBase')}}" style="width:150px;"><i class="fa fa-envira"></i> Get Base</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
        @if($errors->first('notice'))
            <div class="alert alert-success">{{$errors->first('notice')}}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Your Base</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="option_filter">
                        <select name="option_filter" id="option_filter" class="form-control">
                            <option value="">Select</option>
                            <option value="all">All</option>
                            <option value="used">Used</option>
                            <option value="not_yet">Not yet</option>
                        </select>
                    </div>
                    <br>
                    <div class="option_filter">
                        <a href="?option_filter={{@$_GET['option_filter']}}&action=export" class="btn btn-success"><span class="glyphicon glyphicon-book btn-xs"></span> Export
                        </a>

                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="200">Base Name</th>
                        <th>Base Layout</th>
                        <th>Used</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($baseOfGroups))
                        @foreach($baseOfGroups as $baseOfGroup)
                            <tr>
                                <td>{{$baseOfGroup->name}}</td>
                                <td>
                                    @foreach($baseOfGroup->layouts as $layout)
                                        {{$layout->name."/"}}
                                    @endforeach
                                </td>
                                <th>{{$baseOfGroup->used}}</th>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="panel-footer"><h1></h1></div>
        </div>
    </div>
    <script type="text/javascript">
        $("#option_filter").on('change', function () {
            var filter = $(this).val();
            var url = window.location.href;
            var n = url.indexOf('?');
            url = url.substring(0, n != -1 ? n : url.length);
            if (filter == "") {
                return;
            } else if (filter == "all") {
                window.location.href =url+"?option_filter=all";
            } else if (filter == "used") {
                window.location.href =url+"?option_filter=used";
            } else {
                window.location.href =url+"?option_filter=not_yet";
            }
        });
    </script>
@stop