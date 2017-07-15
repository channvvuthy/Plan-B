@extends('layout.manager.master')
@section('content')
    <h4 class="text-center bg-primary" style="padding:10px;"><?php echo date('F   Y');?></h4>
    <div class="block">
        <div class="block_first" style="width:55%;float:left;">
            <h4 class="text-center">All Member</h4>
            <table class="table table-bordered">
                <thead>
                <tr class="bg-info">
                    <th>No</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Evaluate</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($orders))
                    <?php $i = 1;$total = 0;?>
                    @foreach($orders as $order)
                        <?php $total = $total + $order->Total;?>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->member_name}}</td>
                            <td>{{$order->Total}}</td>
                            <td>{{$i}}</td>
                        </tr>
                        <?php $i++;?>
                    @endforeach
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td></td>

                        <td>{{$total}} </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="blockGroup" style="float:right;width:39%;">
            <h4 class="text-center">Top 5 Member</h4>
            <table style="width: 100%;">
                <thead>
                <tr class="bg-info">
                    <th>Name</th>
                    <th>Total</th>
                    <th>Evaluate</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($orders))
                    <?php $i = 1;$sum = 0;?>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->Total}}</td>
                            <td>{{$i}}</td>
                        </tr>
                        <?php $i++;$sum = $sum + $order->Total;?>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-left">Total</td>
                        <td>{{$sum}}</td>
                    </tr>

                @endif

                </tbody>
            </table>
            <br>
            <br>
            <br>
            <div class="clearfix" style="display: block;clear: both;"></div>
            <h4 class="text-center">First Template</h4>
            <table style="width: 100%;">
                <thead>
                <tr class="bg-info">
                    <th>Group Name</th>
                    <th>Total</th>
                    <th>Evaluate</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($first))
                    <?php $i = 1;$sum = 0;?>
                    @foreach($first as $f)
                        <tr>
                            <td>{{$f->member_name}}</td>
                            <td>{{$f->Total}}</td>
                            <td>{{$i}}</td>
                        </tr>
                        <?php $i++;$sum = $sum + $f->Total;?>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-left">Total</td>
                        <td>{{$sum}}</td>
                    </tr>

                @endif

                </tbody>
            </table>
            <br>
            <br>
            <br>
            <div class="clearfix" style="display: block;clear: both;"></div>
            <h4 class="text-center">Base Template</h4>
            <table style="width: 100%;">
                <thead>
                <tr class="bg-info">
                    <th>Group Name</th>
                    <th>Total</th>
                    <th>Evaluate</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($bases))
                    <?php $i = 1;$sum = 0;?>
                    @foreach($bases as $f)
                        <?php $userName=\App\Models\User::where('id',$f->user_id)->first()->name;?>
                        <tr>
                            <td>{{$userName}}</td>
                            <td>{{$f->Total}}</td>
                            <td>{{$i}}</td>
                        </tr>
                        <?php $i++;$sum = $sum + $f->Total;?>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-left">Total</td>
                        <td>{{$sum}}</td>
                    </tr>

                @endif

                </tbody>
            </table>

        </div>
    </div>
@stop