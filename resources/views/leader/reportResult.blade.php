@extends('layout.leaders.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.leaders.widget.header')
    @include('layout.leaders.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled text-center">
                <li><a href="{{route('leader.index')}}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="{{route('FirstLeaderReport')}}"><i class="fa fa-print"></i> Report</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="{{route('FirstLeaderReport')}}" class="SystemForm" method="get" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            @if($errors->first('notice'))
                <div class="alert alert-success">{{$errors->first('notice')}}</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Report</h4>
                </div>
                <div class="panel-body" style="padding:10px;">
                    <div class="manager_tool">
                        <div class="tool">
                            <input type="text" name="start" id="start" class="form-control">
                        </div>
                        <div class="tool">
                            <p>TO</p>
                        </div>
                        <div class="tool">
                            <input type="text" name="end" id="to" class="form-control">
                        </div>
                        <div class="tool">
                            <div><button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Search</button></div>
                        </div>
                        <div class="tool">
                            <a  href="{{route('leaderFirst.report')}}" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Report</a></div>
                    </div>
                </div>
                <div class="clear-top-simple"></div>
                <div class="btn btn-primary btn-block" style="cursor:auto;"><h5><?php echo date('d F   Y');?></h5></div>
                <div class="clear-top-simple"></div>
                <div class="col-md-12">
                    <h4 class="text-center">All Member</h4>
                    <table class="table-responsive table-bordered text-center">
                        <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total</th>
                        <th>Evaluate</th>
                        </thead>
                        <tbody>
                        @if(!empty($orders))
                            <?php $i=1;$total=0;?>
                            @foreach($orders as $order)
                                <?php $total=$total+$order->Total;?>
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->member_name}}</td>
                                    <td>{{$order->Total}}</td>
                                    <td>{{$i}}</td>
                                </tr>
                                <?php $i++;?>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-left">Total</td>

                                <td colspan="" class="text-center">{{$total}} </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
        $('#start').datepicker({ dateFormat: 'yy-mm-dd' });
        $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
    </script>
@stop