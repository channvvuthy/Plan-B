@extends('layout.manager.master')
@section('content')
    <h4 class="text-center bg-primary" style="padding:10px;"><?php echo date('F   Y');?></h4>
    <div class="block">
        <div class="block_first">
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
    </div>
@stop