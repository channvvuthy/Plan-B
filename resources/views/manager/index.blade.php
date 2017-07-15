@extends('layout.manager.master')
@section('title')
    Member
@stop
@section('content')
    @include('layout.manager.widget.header')
    @include('layout.manager.widget.navbar')
    <div class="col-md-10">
        <div class="pangasu float">
            <ul class="list-unstyled">
                <li><a href="/administrator/index"><img src="{{asset('icon/1489862497_house.png')}}" alt=""></a></li>
                <li><a href="{{route('createUser')}}">Report</a></li>
            </ul>
        </div>
        <div class="clearfix clear-top-normal" style="margin-top:15px;"></div>

        <form action="" class="SystemForm" method="get" enctype="multipart/form-data">
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
                            <a  href="{{route('manager.report')}}" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Report</a></div>
                        </div>
                    </div>
                    <div class="clear-top-simple"></div>
                    <div class="btn btn-primary btn-block" style="cursor:auto;"><h4><?php echo date('F   Y');?></h4></div>
                    <div class="clear-top-simple"></div>
                    <div class="col-md-8">
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
                    <div class="col-md-4">
                            <h4 class="text-center">Top 5 Member</h4>
                            <table class="table-responsive table-bordered text-center">
                                <thead>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>Evaluate</th>
                                </thead>
                                <tbody>
                                    @if(!empty($orders))
                                    <?php $i=1;?>
                                    @foreach($orders as $order)
                                        @if($i<=5)
                                        <tr>
                                            <td>{{$order->member_name}}</td>
                                            <td>{{$order->Total}}</td>
                                            <td>{{$i}}</td>
                                        </tr>
                                        @endif
                                    <?php $i++;?>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <div class="clear-top-simple">

                            </div>
                            <h4 class="text-center">First Template</h4>
                            <table class="table-responsive table-bordered text-center">
                                <thead>
                                    <th>Group Name</th>
                                    <th>Total</th>
                                    <th>Evaluate</th>
                                </thead>
                                <tbody>
                                    @if(!empty($first))
                                        <?php $i=1;?>
                                        @foreach($first as $f)
                                        <tr>
                                            <td>{{$f->group_name}}</td>
                                            <td>{{$f->Total}}</td>
                                            <td>{{$i}}</td>
                                        </tr>
                                        <?php $i++;?>
                                        @endforeach

                                    @endif

                                </tbody>
                            </table>
                            <div class="clear-top-simple">

                            </div>
                            <br>
                            <br>
                            <h4 class="text-center">Base Template</h4>
                            <table class="table-responsive table-bordered text-center">
                                <thead>
                                    <th>Name</th>
                                    <th>Total</th>
                                    <th>Evaluate</th>
                                </thead>
                                <tbody>
                                @if(!empty($bases))
                                    <?php $i=1;?>
                                    @foreach($bases as $base)
                                    <?php $userName=\App\Models\User::where('id',$base->user_id)->first()->name;?>
                                        <tr>
                                            <td>{{$userName}}</td>
                                            <td>{{$base->Total}}</td>
                                            <td>{{$i}}</td>
                                        </tr>
                                    <?php $i++;?>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div>

        </form>
    </div>
    <script type="text/javascript">
        $('#start').datepicker({ dateFormat: 'yy-dd-mm' });
        $('#to').datepicker({ dateFormat: 'yy-dd-mm' });
    </script>
@stop