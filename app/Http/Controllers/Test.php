<?php
use App\Models\Order;
$orders=Order::orderBy('id','desc')->paginate(100);
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order_ID</th>
            <th>Base_Name</th>
            <th>Layout_ID</th>
            <th>Staff_Name</th>
            <th>Group_Name</th>
            <th>Type</th>
            <th>Block</th>
            <th>Sub</th>
            <th>Leader_Check_Result</th>
            <th>Leader_Check_Problem</th>
            <th>QC_Name</th>
            <th>QC_Check_Result</th>
            <th>QC_Check_Problem</th>
            <th>Dateline</th>
            <th>DateReady</th>
            <th>Ready</th>
            <th>Status</th>
        </tr>
    <tbody>
    <?php foreach ($orders as $order):?>
    <tr>
        <td><?php echo $order->id;?></td>
        <td><?php echo $order->order_id;?></td>
        <td><?php echo $order->layout;?></td>
        <td><?php echo $order->member_name;?></td>
        <td><?php echo $order->group_name;?></td>
        <td><?php echo $order->type;?></td>
        <td><?php echo $order->top_page;?></td>
        <td><?php echo $order->sub_page;?></td>
        <td><?php echo $order->leader_check_result;?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </thead>
</table>


